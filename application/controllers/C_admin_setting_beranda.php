<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_setting_beranda extends CI_Controller
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
        $data['content'] = 'content_admin/setting_beranda_user';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['beranda']    = $this->M_data->get_data('setting_beranda_user')->result();

        $this->load->view('template_admin/content', $data);
    }

    //update beranda
    public function update_beranda()
    {
        $data = array(
            'beranda_tagline'             => $this->input->post('tagline'),
            'beranda_kata_mutiara'        => $this->input->post('kata_mutiara'),
            'beranda_sumber_kata_mutiara' => $this->input->post('sumber_kata_mutiara')
        );

        $this->M_data->update_data('setting_beranda_user', $data, 'id_beranda = 1');
        $this->session->set_flashdata('success', 'Beranda has been updated');
        redirect('C_admin_setting_beranda');
    }
}
