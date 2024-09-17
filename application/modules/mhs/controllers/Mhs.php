<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhs extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('Mhs_model');
    $this->load->model('auth/Auth_model', 'authModel');
    $this->load->model('dosen/dosen_model', 'dosenModel');
    $this->load->model('mahasiswa/mahasiswa_model', 'mahasiswaModel');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Program Studi Management (Mahasiswa)';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    $data['dataDosen'] = $this->dosenModel->getData()->result_array();
    $data['dataMahasiswa'] = $this->mahasiswaModel->getData()->result_array();

    $this->load->view('templates/templateadmin/main_header', $data);
    $this->load->view('templates/loaders/loader');
    $this->load->view('templates/templateadmin/header_menu', $data);
    $this->load->view('templates/templateadmin/navbar_menu', $data);
    $this->load->view('mhs/mhs', $data);
    $this->load->view('templates/templateadmin/main_footer');
  }
}
