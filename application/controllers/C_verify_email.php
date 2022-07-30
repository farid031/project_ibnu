<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_verify_email extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }

    public function index($id_user)
    {
        $dataIns = array(
            'user_email_is_verif' => 1,
            'user_email_verif_at' => date('Y-m-d H:i:s')
        );

        $this->M_data->update_data('user', $dataIns, array('id_user' => $id_user));

        $this->session->set_flashdata('success', 'Your Email has been successfully verified...!');
        redirect(base_url('C_login'));
    }
}
