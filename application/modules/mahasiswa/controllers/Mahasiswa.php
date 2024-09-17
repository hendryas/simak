<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('Mahasiswa_model');
    $this->load->model('auth/Auth_model', 'authModel');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Program Studi Management (Mahasiswa)';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    $data['dataMahasiswa'] = $this->Mahasiswa_model->getData()->result_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required' => 'Nama tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('email', 'email', 'required', [
      'required' => 'Email tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
      'required' => 'No HP tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('nim', 'NIM', 'required', [
      'required' => 'NIM tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'required', [
      'required' => 'Tahun Masuk tidak boleh kosong'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/templatestaff/main_header', $data);
      $this->load->view('templates/loaders/loader');
      $this->load->view('templates/templatestaff/header_menu', $data);
      $this->load->view('templates/templatestaff/navbar_menu', $data);
      $this->load->view('mahasiswa/mahasiswa', $data);
      $this->load->view('templates/templatestaff/main_footer');
    } else {
      $nama = htmlspecialchars($this->input->post('nama'));
      $email = htmlspecialchars($this->input->post('email'));
      $no_hp = htmlspecialchars($this->input->post('no_hp'));
      $nim = htmlspecialchars($this->input->post('nim'));
      $tahun_masuk = htmlspecialchars($this->input->post('tahun_masuk'));
      $foto =  $_FILES['foto']['name'];

      $his    = date("His");
      $thbl   = date("Ymd");

      $dname = explode(".", $_FILES['foto']['name']);
      $ext = end($dname);
      $new_image = $_FILES['foto']['name'] = strtolower('foto_mhs' . '_' . $thbl . '-' . $his . '.' . $ext);

      if ($foto != null) {
        $file_name1 = 'foto_mhs' . '_' . $thbl . '-' . $his;
        $config1['upload_path']          = './assets/img/mhs/';
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
            'no_hp' => $no_hp,
            'nim' => $nim,
            'tahun_masuk' => $tahun_masuk,
            'foto' => $new_image,
            'date_created' => date('Y-m-d H:i:s'),
            'delete_sts' => 0
          ];

          $this->Mahasiswa_model->insertData($data);
          $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data baru telah ditambahkan!</strong></div>');
          redirect('mahasiswa');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data gagal telah ditambahkan!</strong></div>');
        redirect('mahasiswa');
      }
    }
  }

  public function editData()
  {
    $id_mahasiswa = $this->input->post('id_mahasiswa');

    $nama = htmlspecialchars($this->input->post('nama'));
    $email = htmlspecialchars($this->input->post('email'));
    $no_hp = htmlspecialchars($this->input->post('no_hp'));
    $nim = htmlspecialchars($this->input->post('nim'));
    $tahun_masuk = htmlspecialchars($this->input->post('tahun_masuk'));
    $foto =  $_FILES['foto']['name'];

    $his    = date("His");
    $thbl   = date("Ymd");

    $dname = explode(".", $_FILES['foto']['name']);
    $ext = end($dname);
    $new_image = $_FILES['foto']['name'] = strtolower('foto_mhs' . '_' . $thbl . '-' . $his . '.' . $ext);

    if ($foto != null) {
      $file_name1 = 'foto_mhs' . '_' . $thbl . '-' . $his;
      $config1['upload_path']          = './assets/img/mhs/';
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
          'no_hp' => $no_hp,
          'nim' => $nim,
          'tahun_masuk' => $tahun_masuk,
          'foto' => $new_image,
          'date_updated' => date('Y-m-d H:i:s')
        ];

        $this->Mahasiswa_model->updateData($id_mahasiswa, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah diubah!</strong></div>');
        redirect('mahasiswa');
      }
    } else {
      $data = [
        'id_mahasiswa' => $id_mahasiswa,
        'nama' => $nama,
        'email' => $email,
        'no_hp' => $no_hp,
        'nim' => $nim,
        'tahun_masuk' => $tahun_masuk,
        'date_updated' => date('Y-m-d H:i:s')
      ];

      $this->Mahasiswa_model->updateData($id_mahasiswa, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Data telah diubah!</strong></div>');
      redirect('mahasiswa');
    }
  }

  public function deleteData($id)
  {
    $id = decrypt_url($id);
    $data = [
      'delete_sts' => 1,
      'date_updated' => date('Y-m-d H:i:s')
    ];
    $this->Mahasiswa_model->updateData($id, $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah dihapus!</strong></div>');
    redirect('mahasiswa');
  }
}
