<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index()
	{
        $data['page_title'] = 'About Us';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('about');
        $this->load->view('template/footer');
	}
}
