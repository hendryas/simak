<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resetpassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('auth/Auth_model', 'authModel');
    }

    public function index()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->authModel->getDataUser($email)->row_array();

        if ($user) {
            $user_token = $this->authModel->getDataUserToken($token)->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    <strong>Reset password gagal! </strong> Wrong token.</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Reset password gagal! </strong> Wrong email.</div>');
            redirect('auth/login');
        }
    }

    public function changePassword()
    {

        //cek jika sessionnya tidak ada reset_email
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/login');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[8]|matches[password1]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';

            $this->load->view('templates/templateauth/auth_header', $data);
            $this->load->view('auth/resetpasswordpage/change_password');
            $this->load->view('templates/templateauth/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->authModel->updateDataUserPassword($password, $email);

            //setelah reset,hapus dulu sessionnya
            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                <strong>Password berhasil di ubah! </strong> Silahkan login.</div>');
            redirect('auth/login');
        }
    }
}
