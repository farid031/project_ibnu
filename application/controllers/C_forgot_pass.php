<?php
require_once("C:/xampp/htdocs/project_ibnu/application/libraries/PHPMailer/src/PHPMailer.php");
require_once("C:/xampp/htdocs/project_ibnu/application/libraries/PHPMailer/src/SMTP.php");
require_once("C:/xampp/htdocs/project_ibnu/application/libraries/PHPMailer/src/Exception.php");

defined('BASEPATH') or exit('No direct script access allowed');

class C_forgot_pass extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }

    public function index()
    {
        $data['content'] = 'content/forgot_pass_form';
        $data['title']   = 'Engineer Nusantara';

        $this->load->view('template/content', $data);
    }

    public function change_pass_act($id_user)
    {
        $data['content'] = 'content/forgot_pass_act';
        $data['title']   = 'Engineer Nusantara';
        $data['id_user'] = $id_user;

        $this->load->view('template/content', $data);
    }

    public function send_mail()
    {
        $email = $this->input->post('email', TRUE);
        $user = $this->db->get_where('user', array('user_email' => $email));

        if ($user->num_rows() > 0) {
            $hasil = $user->row();

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = "engineernusantara.com";
            $mail->SMTPAuth = true;
            $mail->Username = "admin@engineernusantara.com";
            $mail->Password = "EngineerIndonesia";
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->From = "admin@engineernusantara.com";
            $mail->FromName = "Engineer Nusantara";
            $mail->addAddress($hasil->user_email, $hasil->user_name);
            $mail->isHTML(true);
            $mail->Subject = "Verifikasi Email";

            $html = '
            <p>Hai, ' . $hasil->user_name . ', <br/>Klik tombol di bawah ini untuk merubah password Anda</p><br/>

            <a href="' . base_url('C_forgot_pass/change_pass_act/' . $hasil->id_user) . '" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Ubah Password</a>
        ';
            $mail->Body = $html;
            $mail->AltBody = "This is the plain text version of the email content";
            $mail->send();

            if (!$mail->send()) {
                return $mail->ErrorInfo;
            } else {
                $this->session->set_flashdata('success', 'Your Email has been sent...!');
                redirect(base_url('C_forgot_pass'));
            }
        } else {
            $this->session->set_flashdata('failed', 'Your Email not registered...!');
            redirect(base_url('C_forgot_pass'));
        }
    }

    public function change_pass($id_user)
    {
        $input = $this->input->post();

        $pass = $input['pass'];
        $repass = $input['repass'];
        $hashed  = password_hash($pass, PASSWORD_DEFAULT);

        if ($pass === $repass) {
            $arrInput['user_pass'] = $hashed;

            $this->M_data->update_data('user', $arrInput, array('id_user' => $id_user));

            $this->session->set_flashdata('success', "The Password changed successfully...!");
            redirect(base_url('C_login'));
        } else {
            $this->session->set_flashdata('failed', "The Password don't macth...!");
            redirect(base_url('C_forgot_pass/change_pass_act/'.$id_user));
        }
    }
}
