<?php defined('BASEPATH') OR exit('No direct script access allowed');

class lupa_password extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->model('chatbot_model');
        $this->load->library('session');
    }
    public function index() {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['required'] = '<div class="alert alert-danger" role="alert">Silahkan diisi terlebih dahulu!</div>';

        }
        else{
            $email = $this->input->post('email');
            $pelanggan = $this->db->get_where('tbl_pelanggan', ['email_pelanggan' => $email, 'is_active' => 1])->row_array();
            if ($pelanggan) {
                $token = base64_encode(random_bytes(32));
                $pelanggan_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created'  => time()
                ];
                $this->db->insert('tbl_pelanggan_token',$pelanggan_token);
                $config = [
                    'protocol'  => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_user' => 'info.kampungjawa@gmail.com',
                    'smtp_pass' => 'kjYK1234',
                    'smtp_port' => 465,
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'newline'   => "\r\n"
                ];
                $this->load->library("email", $config);
                $this->email->initialize($config);
                $this->email->from("info.kampungjawa@gmail.com','Kampung Jawa Resto");
                $this->email->to($this->input->post('email'));
                $this->email->subject("Reset Password");
                $this->email->message('
                    <!DOCTYPE html>
                    <html>

                    <head>
                    <title></title>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <style type="text/css">
                    @media screen {
                        @font-face {
                            font-family: "Lato";
                            font-style: normal;
                            font-weight: 400;
                            src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                        }

                        @font-face {
                            font-family: "Lato";
                            font-style: normal;
                            font-weight: 700;
                            src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                        }

                        @font-face {
                            font-family: "Lato";
                            font-style: italic;
                            font-weight: 400;
                            src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                        }

                        @font-face {
                            font-family: "Lato";
                            font-style: italic;
                            font-weight: 700;
                            src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                        }
                    }
                    body,
                    table,
                    td,
                    a {
                        -webkit-text-size-adjust: 100%;
                        -ms-text-size-adjust: 100%;
                    }

                    table,
                    td {
                        mso-table-lspace: 0pt;
                        mso-table-rspace: 0pt;
                    }

                    img {
                        -ms-interpolation-mode: bicubic;
                    }
                    img {
                        border: 0;
                        height: auto;
                        line-height: 100%;
                        outline: none;
                        text-decoration: none;
                    }

                    table {
                        border-collapse: collapse !important;
                    }

                    body {
                        height: 100% !important;
                        margin: 0 !important;
                        padding: 0 !important;
                        width: 100% !important;
                    }
                    a[x-apple-data-detectors] {
                        color: inherit !important;
                        text-decoration: none !important;
                        font-size: inherit !important;
                        font-family: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                    }

                    /* MOBILE STYLES */
                    @media screen and (max-width:600px) {
                        h1 {
                            font-size: 32px !important;
                            line-height: 32px !important;
                        }
                    }

                    /* ANDROID CENTER FIX */
                    div[style*="margin: 16px 0;"] {
                        margin: 0 !important;
                    }
                    </style>
                    </head>

                    <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <!-- LOGO -->
                    <tr>
                    <td bgcolor="#3CBEB2" align="center">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td bgcolor="#3CBEB2" align="center" style="padding: 0px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                    <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Reset Password!</h1> <img src="'.base_url().'images/logokj/logokj11.png'.'" width="125" height="120" style="display: block; border: 0px;" />
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                    <p style="margin: 0;">Kami dapat membantu Anda membuat ulang sandi keamanan Anda sesuai yang Anda inginkan. <br><br>Jika Anda yakin ingin mereset sandi Anda, silakan klik tombol "Reset Password" di bawah ini.</p>
                    </td>
                    </tr>
                    <tr>
                    <td bgcolor="#ffffff" align="left">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                    <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td align="center" style="border-radius: 3px;" bgcolor="#3CBEB2"><a href="'.base_url().'lupa_password/resetpass?email=' . $this->input->post('email') . '&token=' . urlencode($token) .'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #3cbeb2; display: inline-block;">Reset Password</a></td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr> <!-- COPY -->
                    <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                    <p style="margin: 0;">Jika ada pertanyaan, silahkan balas email ini. Kami sangat senang membantu Anda.</p>
                    </td>
                    </tr>
                    <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                    <p style="margin: 0;">Salam,<br>Kampung Jawa</p>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    </body>

                    </html>
                    ');

                // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        $data['success'] =  true;
                    }
                    else{
                        $data['debug'] = $this->email->print_debugger();
                    }
                }
                else{
                    $data['error'] = true;
                }
            }
            echo json_encode($data);
        }
        public function resetpass(){
            $email = $this->input->get('email');
            $token = $this->input->get('token');

            $pelanggan = $this->db->get_where('tbl_pelanggan',['email_pelanggan' => $email])->row_array();

            if ($pelanggan) {
                $pelanggan_token = $this->db->get_where('tbl_pelanggan_token',['token' => $token])->row_array();
                if ($pelanggan_token) {
                    if (time() - $pelanggan_token['date_created'] < 60) {
                        $data['title'] = 'Reset Password';
                        $this->session->set_userdata('reset_email',$email);
                        $this->template_pelanggan->load('template_pelanggan','pelanggan/data/reset_password/index',$data);
                    }
                    else{
                        $this->db->delete('tbl_pelanggan_token', ['email' => $email]);
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Token expired.</div>');
                        redirect('login');
                    }
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                    redirect('login');
                }
            }
            else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
                redirect('login');
            }
        }
        public  function change_password(){
            if (!$this->session->userdata('reset_email')) {
                redirect('login');
            }
            $this->form_validation->set_rules('password1','Password','required|trim|min_length[8]|matches[password2]',[
                'required' => 'Password tidak boleh kosong!',
                'min_length' => 'Panjang password minimal 8 karakter!',
                'matches' => 'Password tidak match!'
            ]);
            $this->form_validation->set_rules('password2','Ulangi Password Baru','required|trim|min_length[8]|matches[password1]',[
                'required' => 'Password tidak boleh kosong!',
                'min_length' => 'Panjang password minimal 8 karakter!',
                'matches' => 'Password tidak match!'
            ]);
            if ($this->form_validation->run()==FALSE) {
                $data['title'] = 'Reset Password';
                $this->template_pelanggan->load('template_pelanggan','pelanggan/data/reset_password/index',$data);
            }
            else {
                $password = $this->input->post('password2');
                $email = $this->session->userdata('reset_email');

                $this->db->set('password_pelanggan', md5($password));
                $this->db->where('email_pelanggan', $email);
                $this->db->update('tbl_pelanggan');

                $this->db->delete('tbl_pelanggan_token', ['email' => $email]);
                $this->session->unset_userdata('reset_email');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil direset! Silahkan login...</div>');
                redirect('login');
            }
        }
    }

