<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url("admin/user/login"), 'refresh');
        }
        $this->load->model('setting_model');
    }

    public function index()
    {
        $data['page_title'] = 'Settings';
        $data['table'] = true;
        $data['setting'] = $this->setting_model->get_all()[0];

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);
        $this->load->view('admin/setting/index', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function edit()
    {
        $data['page_title'] = 'Edit Settings';
        $this->load->helper('form');
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $form_data = array(
                'facebook' => set_value('facebook'),
                'twitter' => set_value('twitter'),
                'instagram' => set_value('instagram'),
                'vimeo' => set_value('vimeo'),
                'youtube' => set_value('youtube'),
                'email' => set_value('email'),
                'info_email' => set_value('info_email'),
            );
            $this->setting_model->edit($form_data);
            redirect(base_url('admin/setting/index'));
        } else {
            $setting = $this->setting_model->get_all()[0];
            $this->load->view('admin/setting/edit', $setting);
        }
        $this->load->view('admin/template/footer', $data);
    }
}
