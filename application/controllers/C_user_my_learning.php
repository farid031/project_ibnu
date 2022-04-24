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

        if (!empty($this->uri->segment(3))) {
            $id_detail = $this->uri->segment(3);
        } else {
            $id_detail = 0;
        }
        
        $data['thumb_url'] = $this->getThumb($id_detail);
        $data['video_url'] = $this->getVideo($id_detail);
        $data['learn_title'] = $this->M_data->get_learning_title();
        $data['learn_detail_judul'] = $this->M_data->get_learning_detail_by_id($id_detail);

        $this->load->view('template/user_content', $data);
    }

    /* public function getThumb($jns_course)
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
    } */

    public function getThumb($id_learn_detail)
    {
        $file = base_url('assets/img/banner-learning/banner_learning_' . $id_learn_detail . '.jpg');

        return $file;
    }

    public function getVideo($id_learn_detail)
    {
        $video = $this->M_data->get_data_where('learning_detail_video', array('vid_learn_id_learn_det' => $id_learn_detail))->result();

        $file = [];
        $empty = '';
        foreach ($video as $data) {
            $file_video = 'assets/video/video-learning/' . $data->vid_learn_url;
            if (file_exists($file_video) === TRUE) {
                array_push($file, base_url($file_video));
            }
        }

        if (count($file) > 0) {
            return $file;
        } else {
            return $empty;
        }        
    }
}
