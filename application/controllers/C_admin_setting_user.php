<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_admin_setting_user extends CI_Controller
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
        $data['content'] = 'content_admin/setting_user';
        $data['title']     = 'Admin Engineer Nusantara';
        $data['user'] = $this->M_data->get_user();

        $this->load->view('template_admin/content', $data);
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

    public function reg_user()
    {
        $data = array(
            'user_is_registered' => 1
        );

        $this->M_data->update_data('user', $data, 'id_user = ' . $_POST['id_user']);
    }

    public function unreg_user()
    {
        $data = array(
            'user_is_registered' => 0
        );

        $this->M_data->update_data('user', $data, 'id_user = ' . $_POST['id_user']);
    }

    public function export_excel_peserta()
    {
        $dir = "./file_excel/peserta/";
        $fileName = 'peserta_'.date('YmdHis').'.xlsx';

        $user = $this->M_data->get_user();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Peserta');
        $sheet->setCellValue('C1', 'Nama Organisasi');
        $sheet->setCellValue('D1', 'Alamat');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Status Register');
        $sheet->setCellValue('G1', 'LinkedIn');
        $sheet->setCellValue('H1', 'Facebook');
        $sheet->setCellValue('I1', 'Instagram');
        $sheet->setCellValue('J1', 'Twitter');
        $sheet->setCellValue('K1', 'Youtube');
        $sheet->setCellValue('L1', 'Waktu Daftar');

        $rows = 2;
        $no = 1;
        foreach ($user as $data) {
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $data->user_name);
            $sheet->setCellValue('C' . $rows, $data->user_company);
            $sheet->setCellValue('D' . $rows, $data->user_address);
            $sheet->setCellValue('E' . $rows, $data->user_email);
            $sheet->setCellValue('F' . $rows, ($data->user_is_registered == '1' ? 'Sudah' : 'Belum'));
            $sheet->setCellValue('G' . $rows, $data->user_linkedin);
            $sheet->setCellValue('H' . $rows, $data->user_facebook);
            $sheet->setCellValue('I' . $rows, $data->user_instagram);
            $sheet->setCellValue('J' . $rows, $data->user_twitter);
            $sheet->setCellValue('K' . $rows, $data->user_youtube);
            $sheet->setCellValue('L' . $rows, date('d M Y, H:i:s', strtotime($data->user_created_at)));
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($dir. $fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url($dir . $fileName)); 
    }
}
