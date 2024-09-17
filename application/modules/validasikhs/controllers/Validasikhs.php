<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasikhs extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('Validasikhs_model');
    $this->load->model('auth/Auth_model', 'authModel');
    $this->load->model('khs/Khs_model', 'Khs_model');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Program Studi Management (Validasi KHS)';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    // $data['dataValidasiKhs'] = $this->Validasikhs_model->getData()->result_array();
    $data['dataKhs'] = $this->Khs_model->getData()->result_array();

    // var_dump($data['dataKhs']);
    // die;

    $this->load->view('templates/templatestaff/main_header', $data);
    $this->load->view('templates/loaders/loader');
    $this->load->view('templates/templatestaff/header_menu', $data);
    $this->load->view('templates/templatestaff/navbar_menu', $data);
    $this->load->view('validasikhs/validasikhs', $data);
    $this->load->view('templates/templatestaff/main_footer');
  }

  public function editData()
  {
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    $id_khs = $this->input->post('id_khs');
    $keterangan = htmlspecialchars($this->input->post('keterangan'));
    $file_upload =  $_FILES['file_upload']['name'];
    $id_user = $data['user']['id_user'];
    $nama_user = $data['user']['name'];
    $nama_user = str_replace(' ', '_', $nama_user);
    $semester = htmlspecialchars($this->input->post('semester'));
    $sks = htmlspecialchars($this->input->post('sks'));

    $his    = date("His");
    $thbl   = date("Ymd");

    $dname = explode(".", $_FILES['file_upload']['name']);
    $ext = end($dname);
    $new_file = $_FILES['file_upload']['name'] = strtolower('validasikhs' . '_' . $semester . '_' . $nama_user . '_' . $thbl . '-' . $his . '.' . $ext);

    if ($file_upload != null) {
      $file_name1 = 'validasikhs' . '_' . $semester . '_' . $nama_user . '_' . $thbl . '-' . $his;
      $config1['upload_path']          = './assets/file_upload/mhs/';
      // $config1['allowed_types']        = 'doc|docx|pdf';
      $config1['allowed_types']        = 'pdf';
      $config1['max_size']             = 4023;
      $config1['remove_space']         = TRUE;
      $config1['file_name']            = $file_name1;

      $this->load->library('upload', $config1);

      if ($this->upload->do_upload('file_upload')) {
        $this->upload->data();

        $data = [
          'id_khs' => $id_khs,
          'keterangan' => $keterangan,
          'file_upload' => $new_file,
          'date_created' => date('Y-m-d H:i:s'),
          'delete_sts' => 0
        ];

        $this->Validasikhs_model->insertData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah ditambah!</strong></div>');
        redirect('validasikhs');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data gagal ditambah!</strong></div>');
      redirect('validasikhs');
    }
  }
}
