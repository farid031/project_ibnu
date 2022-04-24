<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        //$this->load->library('PHPExcel');
    }

    public function index()
    {
        $data['content'] = 'content/register';
        $data['title']     = 'Register';

        $this->load->view('template/content', $data);
    }

    public function saveData()
    {
        $post = $this->input->post();

        if (isset($post['submit'])) {
            $nama    = $post['nama'];
            $company = $post['company'];
            $email   = $post['email'];
            $address = $post['address'];
            $pass    = $post['pass'];
            $repass  = $post['repass'];
            $hashed  = password_hash($pass, PASSWORD_DEFAULT);

            $user = $this->M_data->get_data_where('user', array('user_email' => $email));

            if ($user->num_rows() > 0) {
                $this->session->set_flashdata('failed', 'Sorry, Email '.$email.' already registered, please use another email...!');
                redirect(base_url('C_register'));
            } else {
                if ($pass === $repass) {
                    $dataIns = array(
                        'user_name'         => $nama,
                        'user_company'      => $company,
                        'user_email'        => $email,
                        'user_address'      => $address,
                        'user_pass'         => $hashed,
                        'user_is_registered' => false,
                        'user_created_at'   => date('Y-m-d H:i:s')
                    );

                    $this->M_data->simpan_data('user', $dataIns);

                    redirect(base_url('C_login'));
                } else {
                    $this->session->set_flashdata('failed', 'Sorry, the password you entered is not match...!');
                    redirect(base_url('C_register'));
                }
            }
        }
    }
}
