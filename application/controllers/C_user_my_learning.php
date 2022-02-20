<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user_my_learning extends CI_Controller
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
        $data['content'] = 'content/user/my_learning';
        $data['title']     = 'Engineer Nusantara';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->result();
        $data['jns_course'] = $this->uri->segment(3);
        $data['file_url'] = $this->getMateri($this->uri->segment(3));

        $this->load->view('template/user_content', $data);
    }

    public function getMateri($jns_course)
    {
        if ($jns_course === 'sketching') {
            $file = base_url('assets/img/my_learning_thumb/'.$jns_course.'.jpg');
        } elseif ($jns_course === '3d_modeling') {
            $file = base_url('assets/img/my_learning_thumb/'.$jns_course.'.jpg');
        } elseif ($jns_course === 'assembly') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'drawing') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'weldment') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'sheet_metal') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'surface') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'mold') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'routing') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'simulation') {
            $file = base_url('assets/img/my_learning_thumb/'.$jns_course.'.jpg');
        } elseif ($jns_course === 'motion_analysys') {
            $file = base_url('assets/img/my_learning_thumb/'.$jns_course.'.jpg');
        } elseif ($jns_course === 'flow_simulation') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'cam') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'internal_flow') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'external_flow') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } elseif ($jns_course === 'rendering') {
            $file = base_url('assets/img/my_learning_thumb/' . $jns_course . '.jpg');
        } else {
            $file = '';
        }

        return $file;
    }
}
