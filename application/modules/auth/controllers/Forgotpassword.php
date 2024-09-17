<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgotpassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('auth/Auth_model', 'authModel');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $user = $this->authModel->getDataUser($email)->row_array();

        if ($this->session->userdata('email')) {
            if ($user['id_role'] == 1) {
                redirect('superadmin');
            } elseif ($user['id_role'] == 2) {
                redirect('admin');
            } elseif ($user['id_role'] == 3) {
                redirect('staff');
            } elseif ($user['id_role'] == 4) {
                redirect('customer');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong.',
            'valid_email' => 'Silahkan tuliskan Alamat Email dengan benar.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';

            $this->load->view('templates/templateauth/auth_header', $data);
            $this->load->view('auth/forgotpasswordpage/forgot_password');
            $this->load->view('templates/templateauth/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->authModel->getDataUserActive($email)->row_array();

            // $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            $name = $user['name'];

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->authModel->insertDataUserToken($user_token);

                $this->_sendEmail($token, 'forgot', $name);

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                <strong>Email berhasil dikirim! </strong> Silahkan cek email untuk mereset password.</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Email belum terdaftar atau teraktivasi! </strong> Silahkan gunakan email yang sudah terdaftar.</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    private function _sendEmail($token, $type, $name)
    {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp-relay.sendinblue.com',
            'smtp_user' => 'skehadiran@gmail.com',  // Email gmail
            'smtp_pass'   => '7wsg2zJtrOHqCEY3',  // Password gmail
            'smtp_crypto' => NULL,
            'smtp_port'   => 587,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        $message1 = '
            <!doctype html>
            <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Simple Transactional Email</title>
                <style>
                /* -------------------------------------
                    GLOBAL RESETS
                ------------------------------------- */
                
                /*All the styling goes here*/
                
                img {
                    border: none;
                    -ms-interpolation-mode: bicubic;
                    max-width: 100%; 
                }

                body {
                    background-color: #f6f6f6;
                    font-family: sans-serif;
                    -webkit-font-smoothing: antialiased;
                    font-size: 14px;
                    line-height: 1.4;
                    margin: 0;
                    padding: 0;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%; 
                }

                table {
                    border-collapse: separate;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                    width: 100%; }
                    table td {
                    font-family: sans-serif;
                    font-size: 14px;
                    vertical-align: top; 
                }

                /* -------------------------------------
                    BODY & CONTAINER
                ------------------------------------- */

                .body {
                    background-color: #f6f6f6;
                    width: 100%; 
                }

                /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                .container {
                    display: block;
                    margin: 0 auto !important;
                    /* makes it centered */
                    max-width: 580px;
                    padding: 10px;
                    width: 580px; 
                }

                /* This should also be a block element, so that it will fill 100% of the .container */
                .content {
                    box-sizing: border-box;
                    display: block;
                    margin: 0 auto;
                    max-width: 580px;
                    padding: 10px; 
                }

                /* -------------------------------------
                    HEADER, FOOTER, MAIN
                ------------------------------------- */
                .main {
                    background: #ffffff;
                    border-radius: 3px;
                    width: 100%; 
                }

                .wrapper {
                    box-sizing: border-box;
                    padding: 20px; 
                }

                .content-block {
                    padding-bottom: 10px;
                    padding-top: 10px;
                }

                .footer {
                    clear: both;
                    margin-top: 10px;
                    text-align: center;
                    width: 100%; 
                }
                    .footer td,
                    .footer p,
                    .footer span,
                    .footer a {
                    color: #999999;
                    font-size: 12px;
                    text-align: center; 
                }

                /* -------------------------------------
                    TYPOGRAPHY
                ------------------------------------- */
                h1,
                h2,
                h3,
                h4 {
                    color: #000000;
                    font-family: sans-serif;
                    font-weight: 400;
                    line-height: 1.4;
                    margin: 0;
                    margin-bottom: 30px; 
                }

                h1 {
                    font-size: 35px;
                    font-weight: 300;
                    text-align: center;
                    text-transform: capitalize; 
                }

                p,
                ul,
                ol {
                    font-family: sans-serif;
                    font-size: 14px;
                    font-weight: normal;
                    margin: 0;
                    margin-bottom: 15px; 
                }
                    p li,
                    ul li,
                    ol li {
                    list-style-position: inside;
                    margin-left: 5px; 
                }


                /* -------------------------------------
                    BUTTONS
                ------------------------------------- */
                .btn {
                    box-sizing: border-box;
                    width: 100%; }
                    .btn > tbody > tr > td {
                    padding-bottom: 15px; }
                    .btn table {
                    width: auto; 
                }
                    .btn table td {
                    background-color: #ffffff;
                    border-radius: 5px;
                    text-align: center; 
                }
                    .btn a {
                    background-color: #ffffff;
                    border: solid 1px #3498db;
                    border-radius: 5px;
                    box-sizing: border-box;
                    color: #3498db;
                    cursor: pointer;
                    display: inline-block;
                    font-size: 14px;
                    font-weight: bold;
                    margin: 0;
                    padding: 12px 25px;
                    text-decoration: none;
                    text-transform: capitalize; 
                }

                .btn-primary table td {
                    background-color: #3498db; 
                }

                .btn-primary a {
                    background-color: #3498db;
                    border-color: #3498db;
                    color: #ffffff; 
                }

                /* -------------------------------------
                    OTHER STYLES THAT MIGHT BE USEFUL
                ------------------------------------- */
                .last {
                    margin-bottom: 0; 
                }

                .first {
                    margin-top: 0; 
                }

                .align-center {
                    text-align: center; 
                }

                .align-right {
                    text-align: right; 
                }

                .align-left {
                    text-align: left; 
                }

                .clear {
                    clear: both; 
                }

                .mt0 {
                    margin-top: 0; 
                }

                .mb0 {
                    margin-bottom: 0; 
                }

                .preheader {
                    color: transparent;
                    display: none;
                    height: 0;
                    max-height: 0;
                    max-width: 0;
                    opacity: 0;
                    overflow: hidden;
                    mso-hide: all;
                    visibility: hidden;
                    width: 0; 
                }

                .powered-by a {
                    text-decoration: none; 
                }

                hr {
                    border: 0;
                    border-bottom: 1px solid #f6f6f6;
                    margin: 20px 0; 
                }

                /* -------------------------------------
                    RESPONSIVE AND MOBILE FRIENDLY STYLES
                ------------------------------------- */
                @media only screen and (max-width: 620px) {
                    table.body h1 {
                    font-size: 28px !important;
                    margin-bottom: 10px !important; 
                    }
                    table.body p,
                    table.body ul,
                    table.body ol,
                    table.body td,
                    table.body span,
                    table.body a {
                    font-size: 16px !important; 
                    }
                    table.body .wrapper,
                    table.body .article {
                    padding: 10px !important; 
                    }
                    table.body .content {
                    padding: 0 !important; 
                    }
                    table.body .container {
                    padding: 0 !important;
                    width: 100% !important; 
                    }
                    table.body .main {
                    border-left-width: 0 !important;
                    border-radius: 0 !important;
                    border-right-width: 0 !important; 
                    }
                    table.body .btn table {
                    width: 100% !important; 
                    }
                    table.body .btn a {
                    width: 100% !important; 
                    }
                    table.body .img-responsive {
                    height: auto !important;
                    max-width: 100% !important;
                    width: auto !important; 
                    }
                }

                /* -------------------------------------
                    PRESERVE THESE STYLES IN THE HEAD
                ------------------------------------- */
                @media all {
                    .ExternalClass {
                    width: 100%; 
                    }
                    .ExternalClass,
                    .ExternalClass p,
                    .ExternalClass span,
                    .ExternalClass font,
                    .ExternalClass td,
                    .ExternalClass div {
                    line-height: 100%; 
                    }
                    .apple-link a {
                    color: inherit !important;
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    text-decoration: none !important; 
                    }
                    #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                    font-size: inherit;
                    font-family: inherit;
                    font-weight: inherit;
                    line-height: inherit;
                    }
                    .btn-primary table td:hover {
                    background-color: #34495e !important; 
                    }
                    .btn-primary a:hover {
                    background-color: #34495e !important;
                    border-color: #34495e !important; 
                    } 
                }

                </style>
            </head>
            <body>
                <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                <tr>
                    <td>&nbsp;</td>
                    <td class="container">
                    <div class="content">

                        <!-- START CENTERED WHITE CONTAINER -->
                        <table role="presentation" class="main">

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                <td>
                                <center><img src="https://firebasestorage.googleapis.com/v0/b/fir-crud-1bbd7.appspot.com/o/logo_newchi_medium.png?alt=media&token=71203888-e6aa-4dd0-93a2-41a9deb2244c" alt="" height="100px" width="100px"></center>
                                    <p>Halo, ' . $name . '</p>
                                    <p>Silakan lakukan verifikasi pada akun anda dengan menekan tombol di bawah ini.</p>
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                    <tbody>
                                        <tr>
                                        <td align="left">
                                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                <td> <a href="' . base_url() . 'auth/register/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Aktivasi </a> </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <p>Anda dapat segera bergabung bersama NEWCHI untuk dapat menikmati layanan.</p>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>

                        <!-- END MAIN CONTENT AREA -->
                        </table>
                        <!-- END CENTERED WHITE CONTAINER -->

                        <!-- START FOOTER -->
                        <div class="footer">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                            <td class="content-block">
                                <span class="apple-link">Copyright by NEWCHI</span>
                            </td>
                            </tr>
                            <tr>
                            <td class="content-block powered-by">
                                Powered by <a href="http://newchi.id">NEWCHI</a>.
                            </td>
                            </tr>
                        </table>
                        </div>
                        <!-- END FOOTER -->

                    </div>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </table>
            </body>
            </html>';

        $message2 = '<!doctype html>
            <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Simple Transactional Email</title>
                <style>
                /* -------------------------------------
                    GLOBAL RESETS
                ------------------------------------- */
                
                /*All the styling goes here*/
                
                img {
                    border: none;
                    -ms-interpolation-mode: bicubic;
                    max-width: 100%; 
                }

                body {
                    background-color: #f6f6f6;
                    font-family: sans-serif;
                    -webkit-font-smoothing: antialiased;
                    font-size: 14px;
                    line-height: 1.4;
                    margin: 0;
                    padding: 0;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%; 
                }

                table {
                    border-collapse: separate;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                    width: 100%; }
                    table td {
                    font-family: sans-serif;
                    font-size: 14px;
                    vertical-align: top; 
                }

                /* -------------------------------------
                    BODY & CONTAINER
                ------------------------------------- */

                .body {
                    background-color: #f6f6f6;
                    width: 100%; 
                }

                /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                .container {
                    display: block;
                    margin: 0 auto !important;
                    /* makes it centered */
                    max-width: 580px;
                    padding: 10px;
                    width: 580px; 
                }

                /* This should also be a block element, so that it will fill 100% of the .container */
                .content {
                    box-sizing: border-box;
                    display: block;
                    margin: 0 auto;
                    max-width: 580px;
                    padding: 10px; 
                }

                /* -------------------------------------
                    HEADER, FOOTER, MAIN
                ------------------------------------- */
                .main {
                    background: #ffffff;
                    border-radius: 3px;
                    width: 100%; 
                }

                .wrapper {
                    box-sizing: border-box;
                    padding: 20px; 
                }

                .content-block {
                    padding-bottom: 10px;
                    padding-top: 10px;
                }

                .footer {
                    clear: both;
                    margin-top: 10px;
                    text-align: center;
                    width: 100%; 
                }
                    .footer td,
                    .footer p,
                    .footer span,
                    .footer a {
                    color: #999999;
                    font-size: 12px;
                    text-align: center; 
                }

                /* -------------------------------------
                    TYPOGRAPHY
                ------------------------------------- */
                h1,
                h2,
                h3,
                h4 {
                    color: #000000;
                    font-family: sans-serif;
                    font-weight: 400;
                    line-height: 1.4;
                    margin: 0;
                    margin-bottom: 30px; 
                }

                h1 {
                    font-size: 35px;
                    font-weight: 300;
                    text-align: center;
                    text-transform: capitalize; 
                }

                p,
                ul,
                ol {
                    font-family: sans-serif;
                    font-size: 14px;
                    font-weight: normal;
                    margin: 0;
                    margin-bottom: 15px; 
                }
                    p li,
                    ul li,
                    ol li {
                    list-style-position: inside;
                    margin-left: 5px; 
                }


                /* -------------------------------------
                    BUTTONS
                ------------------------------------- */
                .btn {
                    box-sizing: border-box;
                    width: 100%; }
                    .btn > tbody > tr > td {
                    padding-bottom: 15px; }
                    .btn table {
                    width: auto; 
                }
                    .btn table td {
                    background-color: #ffffff;
                    border-radius: 5px;
                    text-align: center; 
                }
                    .btn a {
                    background-color: #ffffff;
                    border: solid 1px #3498db;
                    border-radius: 5px;
                    box-sizing: border-box;
                    color: #3498db;
                    cursor: pointer;
                    display: inline-block;
                    font-size: 14px;
                    font-weight: bold;
                    margin: 0;
                    padding: 12px 25px;
                    text-decoration: none;
                    text-transform: capitalize; 
                }

                .btn-primary table td {
                    background-color: #3498db; 
                }

                .btn-primary a {
                    background-color: #3498db;
                    border-color: #3498db;
                    color: #ffffff; 
                }

                /* -------------------------------------
                    OTHER STYLES THAT MIGHT BE USEFUL
                ------------------------------------- */
                .last {
                    margin-bottom: 0; 
                }

                .first {
                    margin-top: 0; 
                }

                .align-center {
                    text-align: center; 
                }

                .align-right {
                    text-align: right; 
                }

                .align-left {
                    text-align: left; 
                }

                .clear {
                    clear: both; 
                }

                .mt0 {
                    margin-top: 0; 
                }

                .mb0 {
                    margin-bottom: 0; 
                }

                .preheader {
                    color: transparent;
                    display: none;
                    height: 0;
                    max-height: 0;
                    max-width: 0;
                    opacity: 0;
                    overflow: hidden;
                    mso-hide: all;
                    visibility: hidden;
                    width: 0; 
                }

                .powered-by a {
                    text-decoration: none; 
                }

                hr {
                    border: 0;
                    border-bottom: 1px solid #f6f6f6;
                    margin: 20px 0; 
                }

                /* -------------------------------------
                    RESPONSIVE AND MOBILE FRIENDLY STYLES
                ------------------------------------- */
                @media only screen and (max-width: 620px) {
                    table.body h1 {
                    font-size: 28px !important;
                    margin-bottom: 10px !important; 
                    }
                    table.body p,
                    table.body ul,
                    table.body ol,
                    table.body td,
                    table.body span,
                    table.body a {
                    font-size: 16px !important; 
                    }
                    table.body .wrapper,
                    table.body .article {
                    padding: 10px !important; 
                    }
                    table.body .content {
                    padding: 0 !important; 
                    }
                    table.body .container {
                    padding: 0 !important;
                    width: 100% !important; 
                    }
                    table.body .main {
                    border-left-width: 0 !important;
                    border-radius: 0 !important;
                    border-right-width: 0 !important; 
                    }
                    table.body .btn table {
                    width: 100% !important; 
                    }
                    table.body .btn a {
                    width: 100% !important; 
                    }
                    table.body .img-responsive {
                    height: auto !important;
                    max-width: 100% !important;
                    width: auto !important; 
                    }
                }

                /* -------------------------------------
                    PRESERVE THESE STYLES IN THE HEAD
                ------------------------------------- */
                @media all {
                    .ExternalClass {
                    width: 100%; 
                    }
                    .ExternalClass,
                    .ExternalClass p,
                    .ExternalClass span,
                    .ExternalClass font,
                    .ExternalClass td,
                    .ExternalClass div {
                    line-height: 100%; 
                    }
                    .apple-link a {
                    color: inherit !important;
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    text-decoration: none !important; 
                    }
                    #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                    font-size: inherit;
                    font-family: inherit;
                    font-weight: inherit;
                    line-height: inherit;
                    }
                    .btn-primary table td:hover {
                    background-color: #34495e !important; 
                    }
                    .btn-primary a:hover {
                    background-color: #34495e !important;
                    border-color: #34495e !important; 
                    } 
                }

                </style>
            </head>
            <body>
                <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                <tr>
                    <td>&nbsp;</td>
                    <td class="container">
                    <div class="content">

                        <!-- START CENTERED WHITE CONTAINER -->
                        <table role="presentation" class="main">

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                <td>
                                <center><img src="https://firebasestorage.googleapis.com/v0/b/fir-crud-1bbd7.appspot.com/o/logo_newchi_medium.png?alt=media&token=71203888-e6aa-4dd0-93a2-41a9deb2244c" alt="" height="100px" width="100px"></center>
                                    <p>Halo, ' . $name . '</p>
                                    <p>Silakan lakukan reset password pada akun anda, bila anda tidak merasa melakukan ini mohon abaikan saja pesan ini.</p>
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                    <tbody>
                                        <tr>
                                        <td align="left">
                                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                <td> <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a> </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <p>Anda dapat segera bergabung bersama NEWCHI untuk dapat menikmati layanan.</p>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>

                        <!-- END MAIN CONTENT AREA -->
                        </table>
                        <!-- END CENTERED WHITE CONTAINER -->

                        <!-- START FOOTER -->
                        <div class="footer">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                            <td class="content-block">
                                <span class="apple-link">Copyright by NEWCHI</span>
                            </td>
                            </tr>
                            <tr>
                            <td class="content-block powered-by">
                                Powered by <a href="http://newchi.id">NEWCHI</a>.
                            </td>
                            </tr>
                        </table>
                        </div>
                        <!-- END FOOTER -->

                    </div>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </table>
            </body>
            </html>';

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('skehadiran@gmail.com', 'NEWCHI - Keep it Clean');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message($message1); // bisa di manpulasi memakai HTML
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message($message2); // bisa di manpulasi memakai HTML
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
