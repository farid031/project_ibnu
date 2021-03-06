<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_learning_header extends CI_Controller
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

    public function index($id_title)
    {
        $data['content'] = 'content_admin/learning_header';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['learn_header'] = $this->M_data->get_learning_header($id_title);
        $data['learn_title'] = $this->M_data->get_data_where('learning_title', ['id_learn_title' => $id_title])->result();

        $this->load->view('template_admin/content', $data);
    }

    public function input_learn_header($id_title)
    {
        $input = $this->input->post();

        $data = array(
            'learn_head_id_title'      => $id_title,
            'learn_head_desc'          => $input['learn_head'],
            'learn_head_created_by'    => $this->session->userdata('id'),
            'learn_head_created_at'    => date('Y-m-d H:i:s')
        );

        $this->M_data->simpan_data('learning_header', $data);
        redirect('C_admin_learning_header/index/' . $id_title);
    }

    public function update_learn_header($id_learn_header)
    {
        $input = $this->input->post();
        $id = explode('-', $id_learn_header);
        $id_header = $id[0];
        $id_title = $id[1];

        $data = array(
            'learn_head_desc'          => $input['learn_head'],
            'learn_head_created_by'    => $this->session->userdata('id'),
            'learn_head_created_at'    => date('Y-m-d H:i:s')
        );

        $this->M_data->update_data('learning_header', $data, 'id_learn_head = ' . $id_header);
        redirect('C_admin_learning_header/index/' . $id_title);
    }

    public function delete_learn_header()
    {
        $this->M_data->hapus_data('learning_header', 'id_learn_head = ' . $_POST['id_learn_head']);
    }
}
