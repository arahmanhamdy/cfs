<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('course_model');
    }

    public function index()
	{
        $data['page_title'] = 'Home';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $home['top_blogs'] = $this->blog_model->get_top();
        $home['bottom_blogs'] = $this->blog_model->get_bottom();
        $home['course'] = $this->course_model->get_home_course();
		$this->load->view('index', $home);
        $this->load->view('template/footer');
	}
}
