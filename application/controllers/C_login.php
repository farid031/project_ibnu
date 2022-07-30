<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        //$this->load->library('PHPExcel');
    }

    public function index()
    {
        $data['content'] = 'content/login';
        $data['title']     = 'Login';

        $this->load->view('template/content', $data);
    }

    public function login()
    {
        $user = $this->input->post('email', TRUE);
        $pass = $this->input->post('pass', TRUE);

        $cek  = $this->db->get_where('user', ['user_email' => $user]);

        if ($cek->num_rows() > 0) {
            $hasil = $cek->row();
            if ($hasil->user_email_is_verif == 1) {
                if (password_verify($pass, $hasil->user_pass)) {
                    // membuat session
                    $userdata = array(
                        'id'            => $hasil->id_user,
                        'email'         => $hasil->user_email,
                        'nama'          => $hasil->user_name,
                        'is_registered' => ($hasil->user_is_registered == 1 ? true : false),
                        'is_login'      => TRUE,
                        'is_admin'      => ($hasil->user_is_admin == 1 ? TRUE : FALSE),
                    );

                    $this->session->set_userdata($userdata);

                    if ($hasil->user_is_admin == 1) {
                        redirect(base_url('C_admin_beranda'));
                    } else {
                        redirect(base_url('C_user_beranda'));
                    }
                } else {
                    $this->session->set_flashdata('failed', 'Password is wrong...!');
                    redirect(base_url('C_login'));
                }
            } else {
                $this->session->set_flashdata('failed', 'Email is not verified...!');
                redirect(base_url('C_login'));
            }
        } else {
            $this->session->set_flashdata('failed', 'Username is invalid...!');
            redirect(base_url('C_login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('C_login'));
    }
}
