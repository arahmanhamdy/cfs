<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $this->load->model('blog_model');
        $this->load->model('user_model');
    }

    public function index()
    {
        $data['page_title'] = 'Blogs';
        $data['table'] = true;
        $data['blogs'] = $this->blog_model->get_all();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);
        $this->load->view('admin/blog/index', $data);
        $this->load->view('admin/template/footer', $data);
    }

    function handle_upload()
    {
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
                // set a $_POST value for 'image' that we can use later
                return true;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return false;
            }
        } else {
            // throw an error because nothing was uploaded
            $this->form_validation->set_message('handle_upload', "You must upload an image!");
            return false;
        }
    }

    function add()
    {
        $data['page_title'] = 'Add Blog';
        $data['textarea'] = true; // To include MCEditor javascript files
        $data['users'] = $this->user_model->get_all();
        $this->load->helper('form');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');
            $config = array(
                'file_name' => time() . $_FILES["image"]['name'],
                'upload_path' => APPPATH . '../static/uploads/blog/',
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'max_height' => "2000",
                'max_width' => "2048"
            );
            $this->load->library('upload', $config);
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            $this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');

            if ($this->form_validation->run() == FALSE || $this->upload->display_errors()) {
                $form_data = array(
                    'title' => set_value('title'),
                    'body' => set_value('body'),
                    'is_slider' => set_value('is_slider'),
                    'image' => set_value('image'),
                    'user_id' => set_value('user_id'),
                );
                $this->load->view('admin/blog/add', $form_data);
            } else {
                $session_data = $this->session->userdata('logged_in');
                $img_data = $this->upload->data();
                $form_data = array(
                    'title' => set_value('title'),
                    'body' => set_value('body'),
                    'is_slider' => set_value('is_slider'),
                    'image' => $img_data['file_name'],
                    'user_id' => set_value('user_id'),
                );
                if ($this->blog_model->add($form_data) == TRUE) {
                    redirect(base_url('admin/blog/index'));
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            }
        } else {
            $this->load->view('admin/blog/add', $data);
        }

        $this->load->view('admin/template/footer', $data);
    }

    public function delete($id = null)
    {
        $this->blog_model->delete($id);
        redirect(base_url('admin/blog/index'));
    }

    public function edit($id = null)
    {
        $data['page_title'] = 'Edit Blog';
        $data['textarea'] = true; // To include MCEditor javascript files
        $data['users'] = $this->user_model->get_all();
        $this->load->helper('form');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');
            $config = array(
                'file_name' => time() . $_FILES["image"]['name'],
                'upload_path' => APPPATH . '../static/uploads/blog/',
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');
            }
            if ($this->form_validation->run() == FALSE) {
                $form_data = array(
                    'title' => set_value('title'),
                    'body' => set_value('body'),
                    'is_slider' => set_value('is_slider'),
                    'image' => set_value('image'),
                    'user_id' => set_value('user_id'),
                );
                $this->load->view('admin/blog/add', $form_data);
            } else {
                $form_data = array(
                    'title' => set_value('title'),
                    'body' => set_value('body'),
                    'is_slider' => set_value('is_slider'),
                    'user_id' => set_value('user_id'),
                );
                if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    $img_data = $this->upload->data();
                    $form_data['image'] = $img_data['file_name'];
                }
                if ($this->blog_model->edit($id, $form_data) == TRUE) {
                    redirect(base_url('admin/blog/index'));
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            }
        } else {
            $data['blog'] = $this->blog_model->get_blog($id);
            if (count($data['blog']) == 0) {
                show_404();
            } else {
                $this->load->view('admin/blog/edit', $data['blog'][0]);
            }
        }

        $this->load->view('admin/template/footer', $data);
    }

    public function slider()
    {
        $id = $this->uri->segment(5);
        $data = ['is_slider' => $this->uri->segment(4)];
        $this->blog_model->edit_slider($id, $data);
        redirect(base_url('admin/blog/index'));
    }

}
