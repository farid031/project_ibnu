<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_learning extends CI_Controller
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
        $data['content'] = 'content_admin/learning';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['learn_title']    = $this->M_data->get_learning_title();

        $this->load->view('template_admin/content', $data);
    }

    public function input_learn_title()
    {
        $input = $this->input->post();

        $data = array(
            'learn_title_desc'          => $input['learn_title'],
            'learn_title_created_by'    => $this->session->userdata('id'),
            'learn_title_created_at'    => date('Y-m-d H:i:s')
        );

        $this->M_data->simpan_data('learning_title', $data);
        redirect('C_admin_learning');
    }

    //update sertifikat
    public function update_learn_title($id_learn_title)
    {
        $input = $this->input->post();
        $data = array(
            'learn_title_desc'          => $input['learn_title'],
            'learn_title_updated_by'    => $this->session->userdata('id'),
            'learn_title_updated_at'    => date('Y-m-d H:i:s')
        );

        $this->M_data->update_data('learning_title', $data, 'id_learn_title = ' . $id_learn_title);
        redirect('C_admin_learning');
    }

    public function delete_learn_title()
    {
        $this->M_data->hapus_data('learning_title', 'id_learn_title = ' . $_POST['id_learn_title']);
    }
}
