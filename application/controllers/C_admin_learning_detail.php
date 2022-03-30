<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_learning_detail extends CI_Controller
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

    public function index($id_header)
    {
        $data['content'] = 'content_admin/learning_detail';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['learn_detail'] = $this->M_data->get_learning_detail($id_header);

        $this->load->view('template_admin/content', $data);
    }

    public function input_learn_detail($id_header)
    {
        $input = $this->input->post();

        $id = $this->M_data->get_max_id('learning_detail', 'id_learn_det');
        $next_id = $id[0]->id + 1;

        $data = array(
            'id_learn_det'            => $next_id,
            'learn_det_id_header'     => $id_header,
            'learn_det_desc'          => $input['learn_detail'],
            'learn_det_created_by'    => $this->session->userdata('id'),
            'learn_det_created_at'    => date('Y-m-d H:i:s')
        );

        if (isset($_FILES['banner']['name'])) {
            $config_banner = array(
                'upload_path'   => 'assets/img/banner-learning/',
                'allowed_types' => 'gif|jpg|png',
                //'max_size'      => '1024', // in KB
                'file_name'     => 'banner_learning_' . $next_id,
                'overwrite'     => TRUE
            );

            $this->upload->initialize($config_banner);

            if (!$this->upload->do_upload('banner')) {
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
                $data_banner = $this->upload->data();

                $data['learn_det_banner_file'] = $config_banner['file_name'] . $data_banner['file_ext'];
            }
        }

        if (isset($_FILES['video']['name'])) {
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
                            window.location.href = "' . base_url('C_admin_catalog') . '";
                        })
                    </script>
                ';

                die($error);
            } else {
                $data_video = $this->upload->data();

                $data['learn_det_video_file'] = $config_video['file_name'] . $data_video['file_ext'];
            }
        }

        $this->M_data->simpan_data('learning_detail', $data);
        redirect('C_admin_learning_detail/index/' . $id_header);
    }

    public function update_learn_detail($id_learn_detail)
    {
        $input = $this->input->post();
        $id = explode('-', $id_learn_detail);
        $id_detail = $id[0];
        $id_header = $id[1];

        $data = array(
            'learn_det_desc'          => $input['learn_detail'],
            'learn_det_updated_by'    => $this->session->userdata('id'),
            'learn_det_updated_at'    => date('Y-m-d H:i:s')
        );

        if (!empty($_FILES['banner']['name']) || $_FILES['banner']['name'] !== '') {
            $config_banner = array(
                'upload_path'   => 'assets/img/banner-learning/',
                'allowed_types' => 'gif|jpg|png',
                //'max_size'      => '1024', // in KB
                'file_name'     => 'banner_learning_' . $id_detail,
                'overwrite'     => TRUE
            );

            $this->upload->initialize($config_banner);

            if (!$this->upload->do_upload('banner')) {
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
                $data_banner = $this->upload->data();

                $data['learn_det_banner_file'] = $config_banner['file_name'] . $data_banner['file_ext'];
            }
        }

        if (!empty($_FILES['video']['name']) || $_FILES['video']['name'] !== '') {
            $config_video = array(
                'upload_path'   => 'assets/video/video-learning/',
                'allowed_types' => 'mp4|3gp|avi',
                //'max_size'      => '1024', // in KB
                'file_name'     => 'video_learning_' . $id_detail,
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

                $data['learn_det_video_file'] = $config_video['file_name'] . $data_video['file_ext'];
            }
        }

        $this->M_data->update_data('learning_detail', $data, 'id_learn_det = ' . $id_detail);
        redirect('C_admin_learning_detail/index/' . $id_header);
    }

    public function delete_learn_detail()
    {
        $learning = $this->M_data->get_learning_detail_by_id($_POST['id_detail']);
        if (!empty($learning[0]->learn_det_banner_file)) {
            unlink('assets/img/banner-learning/'.$learning[0]->learn_det_banner_file);
        }

        if (!empty($learning[0]->learn_det_video_file)) {
            unlink('assets/video/video-learning/'.$learning[0]->learn_det_video_file);
        }

        $this->M_data->hapus_data('learning_detail', 'id_learn_det = ' . $_POST['id_detail']);
    }
}
