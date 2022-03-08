<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_catalog extends CI_Controller
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
        $data['content'] = 'content_admin/catalog';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['catalog']    = $this->M_data->get_data_catalog();

        $this->load->view('template_admin/content', $data);
    }

    public function input_catalog()
    {
        $input = $this->input->post();
        $id = $this->M_data->get_max_id('catalog', 'id_catalog');
        $next_id = $id[0]->id + 1;

        $config = array(
            'upload_path'   => 'assets/img/flyer-catalog/',
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '1024', // in KB
            'file_name'     => 'flyer_'.$next_id,
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
                'catalog_title'         => $input['nama_katalog'],
                'catalog_penghargaan'   => $input['penghargaan'], 
                'catalog_pelajaran'     => $input['materi'],
                'catalog_harga'         => $input['harga'],
                'catalog_diskon'        => $input['diskon'],
                'catalog_link'          => $input['link'],
                'catalog_flyer_url'     => $config['upload_path'] . $config['file_name'] . $data_gambar['file_ext'],
                'catalog_created_by'    => $this->session->userdata('id'),
                'catalog_created_at'    => date('Y-m-d H:i:s')
            );

            $this->M_data->simpan_data('catalog', $data);
            redirect('C_admin_catalog');
        }
    }

    //update sertifikat
    public function update_catalog($id_catalog)
    {
        $input = $this->input->post();
        $data = array(
                'catalog_title'         => $input['nama_katalog'],
                'catalog_penghargaan'   => $input['penghargaan'], 
                'catalog_pelajaran'     => $input['materi'],
                'catalog_harga'         => $input['harga'],
                'catalog_diskon'        => $input['diskon'],
                'catalog_link'          => $input['link'],
                'catalog_updated_by'    => $this->session->userdata('id'),
                'catalog_updated_at'    => date('Y-m-d H:i:s')
            );

        $this->M_data->update_data('catalog', $data, 'id_catalog = ' . $id_catalog);
        redirect('C_admin_catalog');
    }

    public function delete_catalog()
    {
        $this->M_data->hapus_data('catalog', 'id_catalog = ' . $_POST['id_catalog']);
    }
}
