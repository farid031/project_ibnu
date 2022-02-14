<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user_my_achievements extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');

        if (!empty($this->session->userdata('is_login') == FALSE)) {
            // alert peringatan bahwa harus login
            $this->session->set_flashdata('failed', 'You are not login yet, please login first...');
            redirect(base_url('C_login'));
        }
    }

    public function index()
    {
        $data['content'] = 'content/user/my_achievements';
        $data['title']     = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->result();
        $data['cert'] = $this->M_data->get_data_certificate($this->session->userdata('id'));

        $this->load->view('template/user_content', $data);
    }
}
