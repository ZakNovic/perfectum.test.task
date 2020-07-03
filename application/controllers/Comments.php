<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('comments_model');
    }

    function p($dat, $die = false){
        echo "<pre>" . print_r($dat, 1) . "</pre>";
        if($die){
            die;
        }
    }

    public function index()
    {

        $data['title'] = 'comments';
        $data['comments'] = $this->comments_model->getComments();

        //$params = array();
        $limit_per_page = 1;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->comments_model->get_total();

        if ($total_records > 0)
        {
            $data["results"] = $this->comments_model->get_current_page_records($limit_per_page, $start_index);

            $config['base_url'] = base_url().'comments/create';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('comments/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->helper('date');

        $data['title'] = 'Введите Ваш комментарий';
        $data['comments'] = $this->comments_model->getComments();

        $this->form_validation->set_rules('nickname', 'Nickname');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        $limit_per_page = 3;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->comments_model->get_total();

        if ($total_records > 0)
        {
            $data["results"] = $this->comments_model->get_current_page_records($limit_per_page, $page*$limit_per_page);

            $config['base_url'] = base_url().'comments/create';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = '&laquo;';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = '&raquo;';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-link">';
            $config['cur_tag_close'] = '</li>';

            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
        }

        //$this->p($data["results"]);

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('comments/create', $data);
            $this->load->view('comments/index', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->comments_model->setComments();
            $this->load->view('templates/header', $data);
            $this->load->view('comments/create', $data);
            $this->load->view('comments/index', $data);
            $this->load->view('templates/footer');
            $this->redirect_refresh(base_url().'comments/create');
        }
    }

    public function redirect_refresh($url)
    {
        header("refresh: 1; url=$url");
        echo "Redirecting, please wait...";
        exit();
    }

}
