<?php
require_once("C:/xampp/htdocs/project_ibnu/application/libraries/PHPMailer/src/PHPMailer.php");
require_once("C:/xampp/htdocs/project_ibnu/application/libraries/PHPMailer/src/SMTP.php");
require_once("C:/xampp/htdocs/project_ibnu/application/libraries/PHPMailer/src/Exception.php");

defined('BASEPATH') or exit('No direct script access allowed');

class C_register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        //$this->load->library('PHPExcel');
    }

    public function index()
    {
        $data['content'] = 'content/register';
        $data['title']     = 'Register';

        $html = '
            <p>Hi, Muhammad, <br/>Selamat datang di Engineer Nusantara</p><br/>
            <p><b>Selangkah lagi untuk menikmati layanan Engineer Nusantara</b></p><br/>
            <p>Verifikasi email Anda sekarang dengan menekan tombol di bawah ini.</p><br/>

            <a href="' . base_url('C_register/verifyEmail/') . '" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Verify Email</a>
        ';

        die($html);

        $this->load->view('template/content', $data);
    }

    public function saveData()
    {
        $post = $this->input->post();

        if (isset($post['submit'])) {
            $nama    = $post['nama'];
            $company = $post['company'];
            $email   = $post['email'];
            $address = $post['address'];
            $phone_number = $post['phone_number'];
            $pass    = $post['pass'];
            $repass  = $post['repass'];
            $hashed  = password_hash($pass, PASSWORD_DEFAULT);

            $user = $this->M_data->get_data_where('user', array('user_email' => $email));

            if ($user->num_rows() > 0) {
                $this->session->set_flashdata('failed', 'Sorry, Email '.$email.' already registered, please use another email...!');
                redirect(base_url('C_register'));
            } else {
                if ($pass === $repass) {
                    $dataIns = array(
                        'user_name'         => $nama,
                        'user_company'      => $company,
                        'user_email'        => $email,
                        'user_address'      => $address,
                        'user_phone_number' => $phone_number,
                        'user_pass'         => $hashed,
                        'user_is_registered' => false,
                        'user_created_at'   => date('Y-m-d H:i:s')
                    );

                    $this->M_data->simpan_data('user', $dataIns);

                    $this->sendEmail($email, $nama);

                    $this->session->set_flashdata('success', 'Check Your email to verify your account...!');

                    redirect(base_url('C_login'));
                } else {
                    $this->session->set_flashdata('failed', 'Sorry, the password you entered is not match...!');
                    redirect(base_url('C_register'));
                }
            }
        }
    }

    public function sendEmail($email, $nama)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        $mail->SMTPDebug = 3;
        $mail->isSMTP();                                   
        $mail->Host = "engineernusantara.com";
        $mail->SMTPAuth = true;                            
        $mail->Username = "admin@engineernusantara.com";                 
        $mail->Password = "EngineerIndonesia";                           
        $mail->SMTPSecure = "ssl";                           
        $mail->Port = 465;
        $mail->From = "admin@engineernusantara.com";
        $mail->FromName = "Engineer Nusantara";
        $mail->addAddress($email, $nama);
        $mail->isHTML(true);
        $mail->Subject = "PHP Mailer Tes";

        $html = '
            <p>Hi, '.$nama. ', <br/>Selamat datang di Engineer Nusantara</p><br/>
            <p><b>Selangkah lagi untuk menikmati layanan Engineer Nusantara</b></p><br/>
            <p>Verifikasi email Anda sekarang dengan menekan tombol di bawah ini.</p><br/>

            <a href="'.base_url('C_register/verifyEmail/'.$email).'" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Verify Email</a>
        ';
        $mail->Body = "<i>This a testing mail using PHPMailer SMTP</i>";
        $mail->AltBody = "This is the plain text version of the email content";

        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent successfully";
        }
    }
}
