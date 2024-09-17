<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('auth/Auth_model', 'authModel');
        $this->load->library('session');
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
                redirect('dsn');
            } elseif ($user['id_role'] == 4) {
                redirect('mhs');
            }
        }
        //Buat rules ketika login
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'E-mail tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('captcha', 'Kode Captcha', 'required', [
            'required' => 'Kode captcha harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
            // === CAPTCHA CI ===
            $word = array_merge(range('1', '9'), range('A', 'Z'));
            $acak = shuffle($word);
            $str  = substr(implode($word), 0, 5);

            // Menyimpan huruf acak tersebut kedalam session
            $data_ses = array('captcha_str' => $str);
            $this->session->set_userdata($data_ses);

            $view['captcha_img'] = $str;

            // === END CAPTCHA CI ===

            $view['error'] = '';

            $data['title'] = 'Login';

            $this->load->view('templates/templateauth/auth_header', $data);
            $this->load->view('auth/loginpage/view_index', $view);
            $this->load->view('templates/templateauth/auth_footer');
        } else {
            //Ketika validasi success
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->authModel->getDataUser($email)->row_array();

        // Jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // jika kode captha nya benar
                    if ($this->input->post('captcha') == $this->session->userdata('captcha_str')) {
                        // jika data benar
                        $data = [
                            'id' => $user['id_user'],
                            'email' => $user['email'],
                            'id_role' => $user['id_role']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['id_role'] == 1) {
                            redirect('superadmin');
                        } elseif ($user['id_role'] == 2) {
                            redirect('admin');
                        } elseif ($user['id_role'] == 3) {
                            redirect('dsn');
                        } else {
                            redirect('mhs');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                            <strong>Kode captha salah!</strong> Silahkan coba lagi.</div>');
                        redirect('auth/login');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                        <strong>Password salah!</strong> Silahkan coba lagi.</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    <strong>E-mail ini belum di aktivasi!</strong> Silahkan cek email anda untuk mengaktivasi E-mail anda.</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>E-mail belum terdaftar!</strong> Silahkan daftarkan E-mail anda.</div>');
            redirect('auth/login');
        }
    }
}
