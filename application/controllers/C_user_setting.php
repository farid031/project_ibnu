<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user_setting extends CI_Controller
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
        $data['content'] = 'content/user/setting';
        $data['title']     = 'Engineer Nusantara';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->result();

        $this->load->view('template/user_content', $data);
    }

    public function update_profile($id)
    {
        $company    = $this->input->post('company', TRUE);
        $address    = $this->input->post('address', TRUE);
        $linkedin   = $this->input->post('linkedin', TRUE);
        $facebook   = $this->input->post('facebook', TRUE);
        $instagram  = $this->input->post('instagram', TRUE);
        $twitter    = $this->input->post('twitter', TRUE);
        $youtube    = $this->input->post('youtube', TRUE);
        $pass       = $this->input->post('pass', TRUE);
        $repass     = $this->input->post('repass', TRUE);
        $hashed  = password_hash($pass, PASSWORD_DEFAULT);

        $data = array(
            'user_company'  => $company,
            'user_address'  => $address,
            'user_linkedin' => $linkedin,
            'user_facebook' => $facebook,
            'user_instagram'=> $instagram,
            'user_twitter'  => $twitter,
            'user_youtube'  => $youtube,
        );

        if (!empty($pass) && !empty($repass)) {
            if ($pass === $repass) {
                $data['user_pass'] =  $hashed;
            }
        }

        $this->M_data->update_data('user', $data, ['id_user' => $id]);
        redirect(base_url('C_user_setting'));
    }

    public function update_avatar()
    {
        $config['upload_path']      = 'assets/img/avatar/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['file_name']        = 'avatar_'.$this->session->userdata('id');
        $config['overwrite']        = true;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_avatar')) {
            $error = $this->upload->display_errors();

            die($error);
        } else {
            $data = array(
                'user_avatar' => $config['file_name'].$this->upload->data('file_ext')
            );

            $this->M_data->update_data('user', $data, ['id_user' => $this->session->userdata('id')]);

            die('success');
        }

    }
}
