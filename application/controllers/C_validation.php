<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_validation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }

    public function index()
    {
        $data['content'] = 'content/validation';
        $data['title']     = 'Login';

        $this->load->view('template/content', $data);
    }
}
