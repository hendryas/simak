<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProgramStudi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    is_logged_in();
    $this->load->model('ProgramStudi_model');
    $this->load->model('auth/Auth_model', 'authModel');
    $this->load->model('fakultas/fakultas_model', 'fakultasModel');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Program Studi Management';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    $data['dataProgramStudi'] = $this->ProgramStudi_model->getData()->result_array();
    $data['dataFakultas'] = $this->fakultasModel->getData()->result_array();

    $this->form_validation->set_rules('nama_program_studi', 'Nama Program Studi', 'required', [
      'required' => 'Nama Program Studi tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('jenjang', 'Jenjang', 'required', [
      'required' => 'Nama Program Studi tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required', [
      'required' => 'Akreditasi tidak boleh kosong'
    ]);

    $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required', [
      'required' => 'Nama Fakultas tidak boleh kosong'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/templatestaff/main_header', $data);
      $this->load->view('templates/loaders/loader');
      $this->load->view('templates/templatestaff/header_menu', $data);
      $this->load->view('templates/templatestaff/navbar_menu', $data);
      $this->load->view('programstudi/programstudi', $data);
      $this->load->view('templates/templatestaff/main_footer');
    } else {
      $nama_program_studi = htmlspecialchars($this->input->post('nama_program_studi'));
      $jenjang = htmlspecialchars($this->input->post('jenjang'));
      $akreditasi = htmlspecialchars($this->input->post('akreditasi'));
      $id_fakultas = htmlspecialchars($this->input->post('nama_fakultas'));
      $data = [
        'nama_program_studi' => $nama_program_studi,
        'jenjang' => $jenjang,
        'akreditasi' => $akreditasi,
        'id_fakultas' => $id_fakultas,
        'date_created' => date('Y-m-d H:i:s'),
        'delete_sts' => 0
      ];
      $this->ProgramStudi_model->insertData($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
      <strong>Data baru telah ditambahkan!</strong></div>');
      redirect('programstudi');
    }
  }

  public function editdata()
  {
    $id_fakultas = $this->input->post('id_fakultas');

    $nama_fakultas = htmlspecialchars($this->input->post('nama_fakultas'));
    $data = [
      'nama_fakultas' => $nama_fakultas,
      'date_updated' => date('Y-m-d H:i:s')
    ];

    $this->fakultas_model->updateData($id_fakultas, $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah diubah!</strong></div>');
    redirect('fakultas');
  }
}
