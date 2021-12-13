<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_landing_page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        //$this->load->library('PHPExcel');
    }

    public function index()
    {
        $data['content'] = 'content/landing_page';
        $data['title']     = 'Engineer Nusantara';

        $this->load->view('template/content', $data);
    }
}
