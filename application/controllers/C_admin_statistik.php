<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_statistik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');

        if (!empty($this->session->userdata('is_login') == FALSE)) {
            // alert peringatan bahwa harus login
            $this->session->set_flashdata('failed', 'You are not login yet, please login first...');
            redirect(base_url('C_login'));
        } elseif ($this->session->userdata('is_login') == TRUE && $this->session->userdata('is_admin') == FALSE) {
            // alert peringatan bahwa yang login harus admin
            $this->session->set_flashdata('failed', "You can't login as admin, cause you aren't admin...!");
            redirect(base_url('C_login'));
        }
    }

    public function index()
    {
        $data['content'] = 'content_admin/statistik';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['statistik']      = $this->M_data->get_data_where('setting_landing_page', array('id_landing' => 1))->result();

        $this->load->view('template_admin/content', $data);
    }

    public function update_data()
    {
        $data = array(
            'landing_training'      => $this->input->post('training'),
            'landing_peserta'       => $this->input->post('peserta'),
            'landing_sertifikat'    => $this->input->post('sertifikat'),
            'landing_kepuasan'      => $this->input->post('kepuasan')
        );

        $this->M_data->update_data('setting_landing_page', $data, 'id_landing = 1');
        $this->session->set_flashdata('success', 'Statistik telah diperbarui...');
        redirect('C_admin_statistik');
    }
}
