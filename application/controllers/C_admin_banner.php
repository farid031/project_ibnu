<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_banner extends CI_Controller
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
        $data['content'] = 'content_admin/banner';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['banner']    = $this->M_data->get_data_banner();

        $this->load->view('template_admin/content', $data);
    }

    public function input_banner()
    {
        $input = $this->input->post();
        $id = $this->M_data->get_max_id('landing_page_banner', 'id_banner');
        $next_id = $id[0]->id + 1;

        $config = array(
            'upload_path'   => 'assets/img/flyer-banner/',
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '1024', // in KB
            'file_name'     => 'banner_'.$next_id,
            'overwrite'     => TRUE
        );

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('flyer')) {
            $error = $this->upload->display_errors();

            $script = '
                <script>
                    Swal.fire({
                        title: "Error",
                        text: "'.$error.'",
                        icon: "error"
                    }).then((result) => {
                        window.location.href = "'.base_url('C_admin_catalog').'";
                    })
                </script>
            ';

            die($error);
        } else {
            $data_gambar = $this->upload->data();
            $data = array(
                'judul_banner'      => $input['judul_banner'],
                'subjudul_banner'   => $input['subjudul_banner'],
                'desc_banner'       => $input['deskripsi'],
                'img_banner_url'    => $config['upload_path'] . $config['file_name'] . $data_gambar['file_ext']
            );

            $this->M_data->simpan_data('landing_page_banner', $data);
            redirect('C_admin_banner');
        }
    }

    //update sertifikat
    public function update_banner($id_banner)
    {
        $input = $this->input->post();
        $data = array(
            'judul_banner'      => $input['judul_banner'],
            'subjudul_banner'   => $input['subjudul_banner'],
            'desc_banner'       => $input['deskripsi'],
        );

        $this->M_data->update_data('landing_page_banner', $data, 'id_banner = ' . $id_banner);
        redirect('C_admin_banner');
    }

    public function delete_banner()
    {
        $banner = $this->M_data->get_banner_by_id($_POST['id_banner']);
        if (!empty($banner[0]->img_banner_url)) {
            unlink($banner[0]->img_banner_url);
        }

        $this->M_data->hapus_data('landing_page_banner', 'id_banner = ' . $_POST['id_banner']);
    }
}
