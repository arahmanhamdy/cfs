<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->model('course_model');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['page_title'] = 'Home';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $home['top_blogs'] = $this->blog_model->get_top();
        $home['bottom_blogs'] = $this->blog_model->get_bottom();
        $home['course'] = $this->course_model->get_home_course();
        $home['courses'] = $this->course_model->get_all();
        $this->load->view('index', $home);
        $this->load->view('template/footer');
    }

    public function send_mail()
    {
        $this->load->library('email');
        $data['page_title'] = 'Request Info';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');

        $Name = set_value('Name');
        $Email = set_value('Email');
        $BirthDate = set_value('BirthDate');
        $CurrentCity = set_value('CurrentCity');
        $Phone = set_value('Phone');
        $Study = set_value('Study');
        $Interest_id = set_value('Interest');
        $Interest = $this->course_model->get_course($Interest_id);
        $msg  = "Name: $Name</br>";
        $msg .= "Email: $Email</br>";
        $msg .= "BirthDate: $BirthDate</br>";
        $msg .= "CurrentCity: $CurrentCity</br>";
        $msg .= "Phone: $Phone</br>";
        $msg .= "Study: $Study</br>";
        $msg .= "Course of Interest:".$Interest[0]['name']."</br>";
        $this->email->from(set_value('Email'), set_value('Name'));
        $this->email->to($this->site_settings->site_settings[0]['info_email']);
        $this->email->subject("Request Info");
        $this->email->message($msg);
        if($this->email->send()){
            $this->load->view('contact_success');
        }
        else{
            $this->load->view('contact_error', $data);
        }
        $this->load->view('template/footer');
    }
}
