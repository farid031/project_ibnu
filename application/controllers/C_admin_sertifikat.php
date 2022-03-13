<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin_sertifikat extends CI_Controller
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
        $data['content']        = 'content_admin/sertifikat';
        $data['title']          = 'Data Sertifikat';
        $data['sertifikat']     = $this->M_data->get_all_certificate();
        $data['user']           = $this->M_data->get_data('user')->result();
        $data['jns_sertifikat']    = $this->M_data->get_data('ref_jns_certificate')->result();

        $this->load->view('template_admin/content', $data);
    }

    public function input_sertifikat()
    {
        $input = $this->input->post();
        $id = $this->M_data->get_max_id('certificate', 'id_cert');
        $next_id = $id[0]->id + 1;

        $config = array(
            'upload_path'   => 'file_sertifikat/',
            'allowed_types' => 'pdf',
            'max_size'      => '2048', // in KB
            'file_name'     => 'certificate_' . $input['pemilik'].'_'.$input['nama_sert'].'_'.date('Ymd') . '_' . date('His'),
            'overwrite'     => TRUE
        );

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_sert')) {
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
            $data_gambar = $this->upload->data();
            $data = array(
                'cert_id_user'      => $input['pemilik'],
                'cert_id_jenis'     => $input['nama_sert'],
                'cert_no'           => $input['id_sert'],
                'cert_name'         => $input['ket_sert'],
                'cert_file_url'     => $config['file_name'] . $data_gambar['file_ext'],
                'cert_created_by'   => $this->session->userdata('id'),
                'cert_created_at'   => date('Y-m-d H:i:s')
            );

            $this->M_data->simpan_data('certificate', $data);

            //create QR Code
            $this->load->library('ciqrcode'); //pemanggilan library QR CODE

            $config_qr['cacheable']    = true; //boolean, the default is true
            $config_qr['cachedir']     = './assets/img/'; //string, the default is application/cache/
            $config_qr['errorlog']     = './assets/img/'; //string, the default is application/logs/
            $config_qr['imagedir']     = './assets/img/qrcode/'; //direktori penyimpanan qr code
            $config_qr['quality']      = true; //boolean, the default is true
            $config_qr['size']         = '1024'; //interger, the default is 1024
            $config_qr['black']        = array(224, 255, 255); // array, default is array(255,255,255)
            $config_qr['white']        = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config_qr);

            $image_name = 'qrcode_' . $input['pemilik'] . '_' . $input['nama_sert'] . '_' . date('Ymd') . '_' . date('His') . '.png'; //buat name dari qr code sesuai dengan nim

            $params['data'] = base_url('C_validation/val_qr/'. $next_id); //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config_qr['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/qrcode/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            redirect('C_admin_sertifikat');
        }
    }

    //update sertifikat
    public function update_sertifikat($id_jns)
    {
        $data = array(
            'jns_cert_name'       => $this->input->post('nama_sertifikat'),
            'jns_cert_updated_by' => $this->session->userdata('id'),
            'jns_cert_updated_at' => date('Y-m-d H:i:s')
        );

        $this->M_data->update_data('ref_jns_certificate', $data, 'id_jns_cert = '.$id_jns);
        redirect('C_admin_setting_jns_sertifikat');
    }

    public function delete_sertifikat()
    {
        $sertifikat = $this->M_data->get_cert_by_id($_POST['id_cert']);
        if (!empty($sertifikat[0]->cert_file_url)) {
            unlink('file_sertifikat/' . $sertifikat[0]->cert_file_url);

            $cert_name = str_replace('certificate', 'qrcode', $sertifikat[0]->cert_file_url);
            $cert_name_2 = str_replace('pdf', 'png', $cert_name);
            unlink('assets/img/qrcode/' . $cert_name_2);
        }

        $this->M_data->hapus_data('certificate', 'id_cert = '.$_POST['id_cert']);
    }
}
