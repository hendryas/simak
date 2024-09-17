<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('auth/Auth_model', 'authModel');
  }

  public function index()
  {
    $data['title'] = 'Profile';
    $email = $this->session->userdata('email');
    $data['user'] = $this->authModel->getDataUser($email)->row_array();
    if ($data['user']['id_role'] == 3) {
      $data['user_profile'] = $this->authModel->getDataProfileDosen($email)->row_array();
    } else {
      $data['user_profile'] = $this->authModel->getDataUserDosen($email)->row_array();
    }

    $this->load->view('templates/templateadmin/main_header', $data);
    $this->load->view('templates/loaders/loader');
    $this->load->view('templates/templateadmin/header_menu', $data);
    $this->load->view('templates/templateadmin/navbar_menu', $data);
    $this->load->view('profile/profile', $data);
    $this->load->view('templates/templateadmin/main_footer');
  }
}
