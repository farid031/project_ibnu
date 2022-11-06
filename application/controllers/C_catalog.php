<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_catalog extends CI_Controller
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
        $data['content'] = 'content/user/catalog';
        $data['title']   = 'Engineer Nusantara';
        $data['user']    = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->result();
        $data['catalog'] = $this->M_data->get_data_catalog();

        $this->load->view('template/user_content', $data);
    }

    public function daftar_pelatihan()
    {
        $id_user = $_POST['id_user'];
        $id_catalog = $_POST['id_catalog'];

        $dataIns = array(
            'daftar_id_peserta'     => $id_user,
            'daftar_id_catalog'     => $id_catalog,
            'daftar_created_by'     => $id_user,
            'daftar_created_at'     => date('Y-m-d H:i:s')
        );

        $this->M_data->simpan_data('peserta_catalog', $dataIns);

    }
}
