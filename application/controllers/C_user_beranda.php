<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user_beranda extends CI_Controller
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
        $data['content'] = 'content/user/beranda';
        $data['title']     = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->result();
        $data['beranda']    = $this->M_data->get_data('setting_beranda_user')->result();
        $data['count_badges']   = $this->M_data->count_badges($this->session->userdata('id'));
        $data['count_certificates']   = $this->M_data->count_certificates($this->session->userdata('id'));

        $this->load->view('template/user_content', $data);
    }
}
