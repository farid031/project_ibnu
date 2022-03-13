<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_beranda extends CI_Controller
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
        $data['content'] = 'content_admin/beranda_admin';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['count_sert']      = $this->M_data->get_count_data('certificate', 'id_cert');
        $data['count_cat']      = $this->M_data->get_count_data('catalog', 'id_catalog');
        $data['count_jns_sert']      = $this->M_data->get_count_data('ref_jns_certificate', 'id_jns_cert');

        $this->load->view('template_admin/content', $data);
    }
}
