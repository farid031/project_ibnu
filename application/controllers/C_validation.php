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
        $data['content']    = 'content/validation';
        $data['title']      = 'Certificate Validation Form';

        $this->load->view('template/content', $data);
    }

    public function validate_cert()
    {
        $cert_number_input = $this->input->post('cert_numb');

        $data['title']      = 'Certificate Validation';
        $data['cert']       = $this->M_data->get_cert_by_numb($cert_number_input);

        if (!empty($data['cert'])) {
            $data['content']    = 'content/validate_cert';
        } else {
            $data['content']    = 'content/validate_cert_invalid';
        }
        $this->load->view('template/content', $data);
    }

    //validate certificate with barcode
    public function val_qr($id_cert)
    {
        $data['title']      = 'Certificate Validation';
        $data['cert']       = $this->M_data->get_cert_by_id($id_cert);

        if (!empty($data['cert'])) {
            $data['content']    = 'content/validate_cert';
        } else {
            $data['content']    = 'content/validate_cert_invalid';
        }
        $this->load->view('template/content', $data);
    }
}
