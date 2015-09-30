<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
    }

    public function index()
    {
        $data['page_title'] = 'Blogs';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);

        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url("blog/index");
        $total_row = $this->blog_model->record_count();
        $config["total_rows"] = $total_row;
        $config["per_page"] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '»';
        $config['prev_link'] = '«';
        $this->pagination->initialize($config);
        if ($this->uri->segment(3)) {
            $page = ($this->uri->segment(3));
        } else {
            $page = 1;
        }
        $data["blogs"] = $this->blog_model->fetch_data($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data['archive'] = $this->blog_model->get_archive();
        $this->load->view('blog', $data);
        $this->load->view('template/footer', $data);
    }

    public function show($id = null)
    {
        $data['page_title'] = 'Blogs';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $data['blog'] = $this->blog_model->get_blog($id)[0];
        $data['archive'] = $this->blog_model->get_archive();
        if (count($data['blog']) == 0) {
            show_404();
        } else {
            $this->load->view('show_blog', $data);
        }
        $this->load->view('template/footer', $data);
    }

    public function archive()
    {
        $data['page_title'] = 'Blogs';
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->library('pagination');
        $year = $this->uri->segment(3);
        $month = $this->uri->segment(4);
        $config = array();
        $config["base_url"] = base_url("blog/archive/$year/$month");
        $total_row = $this->blog_model->record_archive_count($year, $month);
        $config["total_rows"] = $total_row;
        $config["per_page"] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '»';
        $config['prev_link'] = '«';
        $this->pagination->initialize($config);
        if ($this->uri->segment(5)) {
            $page = ($this->uri->segment(5));
        } else {
            $page = 1;
        }
        $data["blogs"] = $this->blog_model->fetch_archive($config["per_page"], $page, $month, $year);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data['archive'] = $this->blog_model->get_archive();
        $this->load->view('blog', $data);
        $this->load->view('template/footer', $data);
    }
}
