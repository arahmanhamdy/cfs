<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $data['page_title'] = 'Users';
        $data['table'] = true;
        $data['users'] = $this->user_model->get_all();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);
        $this->load->view('admin/user/index', $data);
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
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $data['page_title'] = 'Add User';
        $data['textarea'] = true; // To include MCEditor javascript files

        $this->load->helper('form');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');
            $config = array(
                'file_name' => time() . $_FILES["image"]['name'],
                'upload_path' => APPPATH . '../static/uploads/user/',
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'max_height' => "2000",
                'max_width' => "2048"
            );
            $this->load->library('upload', $config);
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            $this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');

            if ($this->form_validation->run() == FALSE || $this->upload->display_errors()) {
                $form_data = array(
                    'username' => set_value('username'),
                );
                $this->load->view('admin/user/add', $form_data);
            } else {
                $img_data = $this->upload->data();
                $form_data = array(
                    'username' => set_value('username'),
                    'password' => md5(set_value('password')),
                    'user_image' => $img_data['file_name']
                );
                if ($this->user_model->add($form_data) == TRUE) {
                    redirect(base_url('admin/user/index'));
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            }
        } else {
            $this->load->view('admin/user/add', $data);
        }

        $this->load->view('admin/template/footer', $data);
    }

    public function delete($id = null)
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $this->user_model->delete($id);
        redirect(base_url('admin/user/index'));
    }

    public function edit($id = null)
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $data['page_title'] = 'Edit User';
        $data['textarea'] = true; // To include MCEditor javascript files

        $this->load->helper('form');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');
            $config = array(
                'file_name' => time() . $_FILES["image"]['name'],
                'upload_path' => APPPATH . '../static/uploads/user/',
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $this->form_validation->set_rules('image', 'Image', 'callback_handle_upload');
            }
            if ($this->form_validation->run() == FALSE) {
                $form_data = array(
                    'username' => set_value('username'),
                    'id' => $id
                );
                $this->load->view('admin/user/edit', $form_data);
            } else {
                $form_data = array(
                    'username' => set_value('username'),
                    'password' => md5(set_value('password')),
                );
                if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    $img_data = $this->upload->data();
                    $form_data['user_image'] = $img_data['file_name'];
                }
                if ($this->user_model->edit($id, $form_data) == TRUE) {
                    redirect(base_url('admin/user/index'));
                } else {
                    echo 'An error occurred saving your information. Please try again later';
                }
            }
        } else {
            $data['user'] = $this->user_model->get_user($id);
            if (count($data['user']) == 0) {
                show_404();
            } else {
                $this->load->view('admin/user/edit', $data['user'][0]);
            }
        }

        $this->load->view('admin/template/footer', $data);
    }

    //This method will have the credentials validation


    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $form_data = array(
            'username' => $this->input->post('username'),
            'password' => md5($password)
        );

        //query the database
        $result = $this->user_model->login($form_data);

        if ($result) {
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    public function login()
    {
        if($this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/index"));
        }
        $data['page_title'] = 'Login';
        $data['is_logged'] = true;
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);

        $this->load->helper('form');

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->library('form_validation');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $form_data = array(
                    'username' => set_value('username'),
                );
                $this->load->view('admin/user/login', $form_data);
            } else {
                redirect(base_url('admin/index'));
            }
        } else {
            $this->load->view('admin/user/login', $data);
        }
        $this->load->view('admin/template/footer', $data);
    }

    function logout()
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect(base_url("admin/user/login"), 'refresh');
    }
}
