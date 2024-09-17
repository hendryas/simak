<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Anda sudah keluar! </strong> Silahkan login untuk melanjutkan kembali.</div>');
        redirect('auth/login');
    }
}
