<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasikrs extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('Validasikrs_model');
    $this->load->model('auth/Auth_model', 'authModel');
    $this->load->model('krs/Krs_model', 'Krs_model');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Program Studi Management (Validasi KRS)';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    // $data['dataValidasiKrs'] = $this->Validasikrs_model->getData()->result_array();
    $data['dataKhs'] = $this->Krs_model->getData()->result_array();

    $this->load->view('templates/templatestaff/main_header', $data);
    $this->load->view('templates/loaders/loader');
    $this->load->view('templates/templatestaff/header_menu', $data);
    $this->load->view('templates/templatestaff/navbar_menu', $data);
    $this->load->view('validasikrs/validasikrs', $data);
    $this->load->view('templates/templatestaff/main_footer');
  }

  public function editData()
  {
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    $id_krs = $this->input->post('id_krs');
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
    $new_file = $_FILES['file_upload']['name'] = strtolower('validasikrs' . '_' . $semester . '_' . $nama_user . '_' . $thbl . '-' . $his . '.' . $ext);

    if ($file_upload != null) {
      $file_name1 = 'validasikrs' . '_' . $semester . '_' . $nama_user . '_' . $thbl . '-' . $his;
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
          'id_krs' => $id_krs,
          'keterangan' => $keterangan,
          'file_upload' => $new_file,
          'date_created' => date('Y-m-d H:i:s'),
          'delete_sts' => 0
        ];

        $this->Validasikrs_model->insertData($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah ditambah!</strong></div>');
        redirect('validasikrs');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data gagal ditambah!</strong></div>');
      redirect('validasikrs');
    }
  }
}
