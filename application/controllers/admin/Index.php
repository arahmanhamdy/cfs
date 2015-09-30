<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $this->load->model('user_model');
        $this->load->model('blog_model');
        $this->load->model('course_model');
    }

    public function index()
	{
        $data['page_title'] = 'Home';
        $data['blog_count'] = $this -> blog_model -> record_count();
        $data['user_count'] = $this -> user_model -> record_count();
        $data['course_count'] = $this -> course_model -> record_count();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);
		$this->load->view('admin/index', $data);
        $this->load->view('admin/template/footer', $data);
	}
}
