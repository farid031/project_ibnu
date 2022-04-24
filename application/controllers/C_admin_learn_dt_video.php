<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_learn_dt_video extends CI_Controller
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

    public function index($id_detail)
    {
        $data['content'] = 'content_admin/learning_dt_video';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['learn_video'] = $this->M_data->get_learning_video($id_detail);
        $data['learn_detail'] = $this->M_data->get_data_where('learning_detail', ['id_learn_det' => $id_detail])->result();

        $this->load->view('template_admin/content', $data);
    }

    public function input_learn_video($id_detail)
    {
        $input = $this->input->post();

        $id = $this->M_data->get_max_id('learning_detail_video', 'id_vid_learn');
        $next_id = $id[0]->id + 1;

        $data = array(
            'id_vid_learn'            => $next_id,
            'vid_learn_id_learn_det'  => $id_detail,
            'vid_learn_desc'          => $input['judul_video'],
            'vid_learn_created_by'    => $this->session->userdata('id'),
            'vid_learn_created_at'    => date('Y-m-d H:i:s')
        );

        if (!empty($_FILES['video']['name']) || $_FILES['video']['name'] !== '') {
            $config_video = array(
                'upload_path'   => 'assets/video/video-learning/',
                'allowed_types' => 'mp4|3gp|avi',
                //'max_size'      => '1024', // in KB
                'file_name'     => 'video_learning_' . $next_id,
                'overwrite'     => TRUE
            );

            $this->upload->initialize($config_video);

            if (!$this->upload->do_upload('video')) {
                $error = $this->upload->display_errors();

                $script = '
                    <script>
                        Swal.fire({
                            title: "Error",
                            text: "' . $error . '",
                            icon: "error"
                        }).then((result) => {
                            window.location.href = "' . base_url('C_admin_learn_dt_video') . '";
                        })
                    </script>
                ';

                die($error);
            } else {
                $data_video = $this->upload->data();

                $data['vid_learn_url'] = $config_video['file_name'] . $data_video['file_ext'];
            }
        }

        $this->M_data->simpan_data('learning_detail_video', $data);
        redirect('C_admin_learn_dt_video/index/' . $id_detail);
    }

    public function update_learn_video($id_learn_video)
    {
        $input = $this->input->post();
        $id = explode('-', $id_learn_video);
        $id_video = $id[0];
        $id_detail = $id[1];

        $data = array(
            'vid_learn_desc'          => $input['judul_video'],
            'vid_learn_updated_by'    => $this->session->userdata('id'),
            'vid_learn_updated_at'    => date('Y-m-d H:i:s')
        );

        if (!empty($_FILES['video']['name']) || $_FILES['video']['name'] !== '') {
            $config_video = array(
                'upload_path'   => 'assets/video/video-learning/',
                'allowed_types' => 'mp4|3gp|avi',
                //'max_size'      => '1024', // in KB
                'file_name'     => 'video_learning_' . $id_video,
                'overwrite'     => TRUE
            );

            $this->upload->initialize($config_video);

            if (!$this->upload->do_upload('video')) {
                $error = $this->upload->display_errors();

                $script = '
                    <script>
                        Swal.fire({
                            title: "Error",
                            text: "' . $error . '",
                            icon: "error"
                        }).then((result) => {
                            window.location.href = "' . base_url('C_admin_catalog') . '";
                        })
                    </script>
                ';

                die($error);
            } else {
                $data_video = $this->upload->data();

                $data['vid_learn_url'] = $config_video['file_name'] . $data_video['file_ext'];
            }
        }

        $this->M_data->update_data('learning_detail_video', $data, 'id_vid_learn = ' . $id_video);
        redirect('C_admin_learn_dt_video/index/' . $id_detail);
    }

    public function delete_learn_video()
    {
        $video = $this->M_data->get_data_where('learning_detail_video', array('id_vid_learn' => $_POST['id_video']))->result();
        
        if (!empty($video[0]->vid_learn_url)) {
            unlink('assets/video/video-learning/'.$video[0]->vid_learn_url);
        }

        $this->M_data->hapus_data('learning_detail_video', 'id_vid_learn = ' . $_POST['id_video']);
    }

    
}
