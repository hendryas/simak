<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('Krs_model');
    $this->load->model('auth/Auth_model', 'authModel');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Program Studi Management (KRS)';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();

    $idRole = $data['user']['id_role'];
    $idUser = $data['user']['id_user'];
    if ($idRole == 4) {
      $data['dataKrs'] = $this->Krs_model->getDataById($idUser)->result_array();
    } else {
      $data['dataKrs'] = $this->Krs_model->getData()->result_array();
    }

    $this->form_validation->set_rules('semester', 'Semester', 'required', [
      'required' => 'Semester tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('sks', 'SKS', 'required', [
      'required' => 'SKS tidak boleh kosong'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/templatestaff/main_header', $data);
      $this->load->view('templates/loaders/loader');
      $this->load->view('templates/templatestaff/header_menu', $data);
      $this->load->view('templates/templatestaff/navbar_menu', $data);
      $this->load->view('krs/krs', $data);
      $this->load->view('templates/templatestaff/main_footer');
    } else {
      $semester = htmlspecialchars($this->input->post('semester'));
      $sks = htmlspecialchars($this->input->post('sks'));
      $file_upload =  $_FILES['file_upload']['name'];
      $id_user = $data['user']['id_user'];
      $nama_user = $data['user']['name'];
      $nama_user = str_replace(' ', '_', $nama_user);

      $his    = date("His");
      $thbl   = date("Ymd");

      $dname = explode(".", $_FILES['file_upload']['name']);
      $ext = end($dname);
      $new_file = $_FILES['file_upload']['name'] = strtolower('krs' . '_' . $semester . '_' . $nama_user . '_' . $thbl . '-' . $his . '.' . $ext);

      if ($file_upload != null) {
        $file_name1 = 'krs' . '_' . $semester . '_' . $nama_user . '_' . $thbl . '-' . $his;
        $config1['upload_path']          = './assets/file_upload/mhs/';
        // $config1['allowed_types']        = 'doc|docx|pdf';
        $config1['allowed_types']        = 'pdf';
        $config1['max_size']             = 3023;
        $config1['remove_space']         = TRUE;
        $config1['file_name']            = $file_name1;

        $this->load->library('upload', $config1);

        if ($this->upload->do_upload('file_upload')) {
          $this->upload->data();

          $data = [
            'semester' => $semester,
            'sks' => $sks,
            'file_upload' => $new_file,
            'id_user' => $id_user,
            'status' => 'Dalam Proses',
            'date_created' => date('Y-m-d H:i:s'),
            'delete_sts' => 0
          ];

          $this->Krs_model->insertData($data);
          $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data baru telah ditambahkan!</strong></div>');
          redirect('krs');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data gagal telah ditambahkan!</strong></div>');
        redirect('krs');
      }
    }
  }

  public function editData()
  {
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    $id_krs = $this->input->post('id_krs');
    $semester = htmlspecialchars($this->input->post('semester'));
    $sks = htmlspecialchars($this->input->post('sks'));
    $file_upload =  $_FILES['file_upload']['name'];
    $id_user = $data['user']['id_user'];
    $nama_user = $data['user']['name'];
    $nama_user = str_replace(' ', '_', $nama_user);

    $his    = date("His");
    $thbl   = date("Ymd");

    $dname = explode(".", $_FILES['file_upload']['name']);
    $ext = end($dname);
    $new_file = $_FILES['file_upload']['name'] = strtolower('krs' . '_' . $semester . '_' . $nama_user . '_' . $thbl . '-' . $his . '.' . $ext);

    if ($file_upload != null) {
      $file_name1 = 'krs' . '_' . $semester . '_' . $nama_user . '_' . $thbl . '-' . $his;
      $config1['upload_path']          = './assets/file_upload/mhs/';
      // $config1['allowed_types']        = 'doc|docx|pdf';
      $config1['allowed_types']        = 'pdf';
      $config1['max_size']             = 3023;
      $config1['remove_space']         = TRUE;
      $config1['file_name']            = $file_name1;

      $this->load->library('upload', $config1);

      if ($this->upload->do_upload('file_upload')) {
        $this->upload->data();

        $data = [
          'semester' => $semester,
          'sks' => $sks,
          'file_upload' => $new_file,
          'date_updated' => date('Y-m-d H:i:s')
        ];

        $this->Krs_model->updateData($id_krs, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah diubah!</strong></div>');
        redirect('krs');
      }
    } else {
      $data = [
        'semester' => $semester,
        'sks' => $sks,
        'date_updated' => date('Y-m-d H:i:s')
      ];

      $this->Krs_model->updateData($id_krs, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data telah diubah!</strong></div>');
      redirect('krs');
    }
  }

  public function deleteData($id)
  {
    $id = decrypt_url($id);
    $data = [
      'delete_sts' => 1,
      'date_updated' => date('Y-m-d H:i:s')
    ];
    $this->Krs_model->updateData($id, $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah dihapus!</strong></div>');
    redirect('krs');
  }
}
