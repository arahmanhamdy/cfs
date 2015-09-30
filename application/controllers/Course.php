<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('course_model');
    }

    public function index()
	{
        $data['page_title'] = 'Programs';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $data['courses'] = $this->course_model->get_all();
        $this->load->view('course', $data);
        $this->load->view('template/footer');
	}
    public function apply()
    {
        $data['page_title'] = 'Apply';
        $this->load->helper('form');
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $form_data = array(
                'Name' => set_value('Name'),
                'BirthDate' => set_value('BirthDate'),
                'CurrentCity' => set_value('CurrentCity'),
                'Email' => set_value('Email'),
                'Phone' => set_value('Phone'),
                'University' => set_value('University'),
                'Study' => set_value('Study'),
                'Job' => set_value('Job'),
                'Interest' => set_value('Interest'),
                'from' => set_value('from'),
                'to' => set_value('from'),
            );
            $this->load->model('course_model');
            if ($this->course_model->add_student($form_data) == TRUE) {
                redirect(base_url('course/index'));
            } else {
                echo 'An error occurred saving your information. Please try again later';
            }
        } else {
            $data['courses'] = $this->course_model->get_all();
            $this->load->view('apply', $data);
        }
        $this->load->view('template/footer');


    }
}
