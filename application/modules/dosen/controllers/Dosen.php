<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('Dosen_model');
    $this->load->model('auth/Auth_model', 'authModel');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Program Studi Management (Dosen)';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    $data['dataDosen'] = $this->Dosen_model->getData()->result_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required' => 'Nama tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('email', 'email', 'required', [
      'required' => 'Email tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('no_telp', 'no_telp', 'required', [
      'required' => 'No HP tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('progdi', 'Program Studi', 'required', [
      'required' => 'Program Studi tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('status_dosen', 'Status', 'required', [
      'required' => 'Status tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('pendidikan_tertinggi', 'Pendidikan tinggi', 'required', [
      'required' => 'Pendidikan tinggi tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
      'required' => 'Jenis Kelamin tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('jabatan_fungsional', 'Jabatan Fungsional', 'required', [
      'required' => 'Jabatan Fungsional tidak boleh kosong'
    ]);


    if ($this->form_validation->run() == false) {
      $this->load->view('templates/templatestaff/main_header', $data);
      $this->load->view('templates/loaders/loader');
      $this->load->view('templates/templatestaff/header_menu', $data);
      $this->load->view('templates/templatestaff/navbar_menu', $data);
      $this->load->view('dosen/dosen', $data);
      $this->load->view('templates/templatestaff/main_footer');
    } else {
      $nama = htmlspecialchars($this->input->post('nama'));
      $email = htmlspecialchars($this->input->post('email'));
      $no_telp = htmlspecialchars($this->input->post('no_telp'));
      $progdi = htmlspecialchars($this->input->post('progdi'));
      $status = htmlspecialchars($this->input->post('status_dosen'));
      $pendidikan_tertinggi = htmlspecialchars($this->input->post('pendidikan_tertinggi'));
      $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
      $jabatan_fungsional = htmlspecialchars($this->input->post('jabatan_fungsional'));
      $foto =  $_FILES['foto']['name'];

      $his    = date("His");
      $thbl   = date("Ymd");

      $dname = explode(".", $_FILES['foto']['name']);
      $ext = end($dname);
      $new_image = $_FILES['foto']['name'] = strtolower('foto_dosen' . '_' . $thbl . '-' . $his . '.' . $ext);

      if ($foto != null) {
        $file_name1 = 'foto_dosen' . '_' . $thbl . '-' . $his;
        $config1['upload_path']          = './assets/img/dosen/';
        // $config1['allowed_types']        = 'doc|docx|pdf';
        $config1['allowed_types']        = 'jpg|png|jpeg';
        $config1['max_size']             = 3023;
        $config1['remove_space']         = TRUE;
        $config1['file_name']            = $file_name1;

        $this->load->library('upload', $config1);

        if ($this->upload->do_upload('foto')) {
          $this->upload->data();

          $data = [
            'nama' => $nama,
            'email' => $email,
            'no_telp' => $no_telp,
            'progdi' => $progdi,
            'status' => $status,
            'pendidikan_tertinggi' => $pendidikan_tertinggi,
            'jenis_kelamin' => $jenis_kelamin,
            'jabatan_fungsional' => $jabatan_fungsional,
            'foto' => $new_image,
            'date_created' => date('Y-m-d H:i:s'),
            'delete_sts' => 0
          ];

          $dataUser = [
            'name' => $nama,
            'date_of_birth' => '',
            'gender' => $jenis_kelamin,
            'phone' => $no_telp,
            'username' => '',
            'email' => $email,
            'password' => '$2y$10$1Y5ALImDUmwS.kCBQGzUeeo//N2l/rECscqfPRxLuLHnkzbYXNlia',
            'id_role' => '3',
            'is_active' => 1,
            'bio' => '',
            'dob' => '',
            'address' => '',
            'user_status' => 'active',
            'unique_id' => '',
            'last_logout' => '',
            'date_created' => date('Y-m-d H:i:s'),
            'created_at' => date('d-m-Y'),
            'date_updated' => '',
            'delete_sts' => '0',
          ];

          $this->Dosen_model->insertData($data);
          $this->authModel->insertDataUser($dataUser);
          $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data baru telah ditambahkan!</strong></div>');
          redirect('dosen');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data gagal telah ditambahkan!</strong></div>');
        redirect('dosen');
      }
    }
  }

  public function editData()
  {
    $id_dosen = $this->input->post('id_dosen');

    $nama = htmlspecialchars($this->input->post('nama'));
    $email = htmlspecialchars($this->input->post('email'));
    $no_telp = htmlspecialchars($this->input->post('no_telp'));
    $progdi = htmlspecialchars($this->input->post('progdi'));
    $status = htmlspecialchars($this->input->post('status_dosen'));
    $pendidikan_tertinggi = htmlspecialchars($this->input->post('pendidikan_tertinggi'));
    $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
    $jabatan_fungsional = htmlspecialchars($this->input->post('jabatan_fungsional'));
    $foto =  $_FILES['foto']['name'];

    $his    = date("His");
    $thbl   = date("Ymd");

    $dname = explode(".", $_FILES['foto']['name']);
    $ext = end($dname);
    $new_image = $_FILES['foto']['name'] = strtolower('foto_dosen' . '_' . $thbl . '-' . $his . '.' . $ext);

    if ($foto != null) {
      $file_name1 = 'foto_dosen' . '_' . $thbl . '-' . $his;
      $config1['upload_path']          = './assets/img/dosen/';
      // $config1['allowed_types']        = 'doc|docx|pdf';
      $config1['allowed_types']        = 'jpg|png|jpeg';
      $config1['max_size']             = 3023;
      $config1['remove_space']         = TRUE;
      $config1['file_name']            = $file_name1;

      $this->load->library('upload', $config1);

      if ($this->upload->do_upload('foto')) {
        $this->upload->data();

        $data = [
          'nama' => $nama,
          'email' => $email,
          'no_telp' => $no_telp,
          'progdi' => $progdi,
          'status' => $status,
          'pendidikan_tertinggi' => $pendidikan_tertinggi,
          'jenis_kelamin' => $jenis_kelamin,
          'jabatan_fungsional' => $jabatan_fungsional,
          'foto' => $new_image,
          'date_updated' => date('Y-m-d H:i:s')
        ];

        $this->Dosen_model->updateData($id_dosen, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah diubah!</strong></div>');
        redirect('dosen');
      }
    } else {
      $data = [
        'nama' => $nama,
        'email' => $email,
        'no_telp' => $no_telp,
        'progdi' => $progdi,
        'status' => $status,
        'pendidikan_tertinggi' => $pendidikan_tertinggi,
        'jenis_kelamin' => $jenis_kelamin,
        'jabatan_fungsional' => $jabatan_fungsional,
        'date_updated' => date('Y-m-d H:i:s')
      ];
      $this->Dosen_model->updateData($id_dosen, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data telah diubah!</strong></div>');
      redirect('dosen');
    }
  }

  public function deleteData($id)
  {
    $id = decrypt_url($id);
    $data = [
      'delete_sts' => 1,
      'date_updated' => date('Y-m-d H:i:s')
    ];
    $this->Dosen_model->updateData($id, $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah dihapus!</strong></div>');
    redirect('dosen');
  }
}
