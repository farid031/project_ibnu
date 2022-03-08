<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_setting_jns_sertifikat extends CI_Controller
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
        $data['content'] = 'content_admin/setting_jns_sertifikat';
        $data['title']     = 'Jenis Sertifikat';
        $data['jns_sertifikat']    = $this->M_data->get_data('ref_jns_certificate')->result();

        $this->load->view('template_admin/content', $data);
    }

    public function input_sertifikat()
    {
        $data = array(
            'jns_cert_name'       => $this->input->post('nama_sertifikat'),
            'jns_cert_created_by' => $this->session->userdata('id'),
            'jns_cert_created_at' => date('Y-m-d H:i:s')
        );

        $this->M_data->simpan_data('ref_jns_certificate', $data);
        redirect('C_admin_setting_jns_sertifikat');
    }

    //update sertifikat
    public function update_sertifikat($id_jns)
    {
        $data = array(
            'jns_cert_name'       => $this->input->post('nama_sertifikat'),
            'jns_cert_updated_by' => $this->session->userdata('id'),
            'jns_cert_updated_at' => date('Y-m-d H:i:s')
        );

        $this->M_data->update_data('ref_jns_certificate', $data, 'id_jns_cert = '.$id_jns);
        redirect('C_admin_setting_jns_sertifikat');
    }

    public function delete_sertifikat()
    {
        $this->M_data->hapus_data('ref_jns_certificate', 'id_jns_cert = '.$_POST['id_jns']);
    }
}
