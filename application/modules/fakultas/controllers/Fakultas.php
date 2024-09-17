<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('fakultas_model');
    $this->load->model('auth/Auth_model', 'authModel');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Menu Management (Fakultas)';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    $data['dataFakultas'] = $this->fakultas_model->getData()->result_array();

    $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required', [
      'required' => 'Nama Fakultas tidak boleh kosong'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/templateadmin/main_header', $data);
      $this->load->view('templates/loaders/loader');
      $this->load->view('templates/templateadmin/header_menu', $data);
      $this->load->view('templates/templateadmin/navbar_menu', $data);
      $this->load->view('fakultas/fakultas', $data);
      $this->load->view('templates/templateadmin/main_footer');
    } else {
      $nama_fakultas = htmlspecialchars($this->input->post('nama_fakultas'));
      $data = [
        'nama_fakultas' => $nama_fakultas,
        'date_created' => date('Y-m-d H:i:s'),
        'delete_sts' => 0
      ];

      $this->fakultas_model->insertData($data);

      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Data baru telah ditambahkan!</strong></div>');
      redirect('fakultas');
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

  public function deleteData($id)
  {
    $id = decrypt_url($id);
    $data = [
      'delete_sts' => 1,
      'date_updated' => date('Y-m-d H:i:s')
    ];
    $this->fakultas_model->updateData($id, $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data telah dihapus!</strong></div>');
    redirect('fakultas');
  }
}
