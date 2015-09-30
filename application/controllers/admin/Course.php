<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $this->load->model('course_model');
    }

    public function index()
    {
        $data['page_title'] = 'Courses';
        $data['table'] = true;
        $data['courses'] = $this->course_model->get_all();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);
        $this->load->view('admin/course/index', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function students()
    {
        $data['page_title'] = 'Students';
        $data['table'] = true;
        $data['students'] = $this->course_model->get_students();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);
        $this->load->view('admin/course/students', $data);
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
        $data['page_title'] = 'Add Course';

        $this->load->helper('form');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');
            $config = array(
                'file_name' => time() . $_FILES["image"]['name'],
                'upload_path' => APPPATH . '../static/uploads/course/',
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('duration', 'Duration', 'required');
            $this->form_validation->set_rules('session', 'Session', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            $this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');

            if ($this->form_validation->run() == FALSE) {
                $form_data = array(
                    'name' => set_value('name'),
                    'duration' => set_value('duration'),
                    'session' => set_value('session'),
                    'description' => set_value('description'),
                );
                $this->load->view('admin/course/add', $form_data);
            } else {

                $img_data = $this->upload->data();
                $form_data = array(
                    'name' => set_value('name'),
                    'duration' => set_value('duration'),
                    'session' => set_value('session'),
                    'description' => set_value('description'),
                    'image' => $img_data['file_name']
                );
                if ($this->course_model->add($form_data) == TRUE) {
                    redirect(base_url('admin/course/index'));
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            }
        } else {
            $this->load->view('admin/course/add', $data);
        }

        $this->load->view('admin/template/footer', $data);
    }

    public function delete($id = null)
    {
        $this->course_model->delete($id);
        redirect(base_url('admin/course/index'));
    }

    public function edit($id = null)
    {
        $data['page_title'] = 'Edit course';

        $this->load->helper('form');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');
            $config = array(
                'file_name' => time() . $_FILES["image"]['name'],
                'upload_path' => APPPATH . '../static/uploads/course/',
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('duration', 'Duration', 'required');
            $this->form_validation->set_rules('session', 'Session', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');
            }
            if ($this->form_validation->run() == FALSE) {
                $form_data = array(
                    'name' => set_value('name'),
                    'duration' => set_value('duration'),
                    'session' => set_value('session'),
                    'description' => set_value('description'),
                );
                $form_data['id'] = $id;
                $this->load->view('admin/course/edit', $form_data);
            } else {
                $form_data = array(
                    'name' => set_value('name'),
                    'duration' => set_value('duration'),
                    'session' => set_value('session'),
                    'description' => set_value('description'),
                );
                if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    $img_data = $this->upload->data();
                    $form_data['image'] = $img_data['file_name'];
                }
                if ($this->course_model->edit($id, $form_data) == TRUE) {
                    redirect(base_url('admin/course/index'));
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            }
        } else {
            $data['course'] = $this->course_model->get_course($id);
            if (count($data['course']) == 0) {
                show_404();
            } else {
                $this->load->view('admin/course/edit', $data['course'][0]);
            }
        }

        $this->load->view('admin/template/footer', $data);
    }

    public function home($id = null)
    {
        $this->course_model->set_home($id);
        redirect(base_url('admin/course/index'));
    }

}
