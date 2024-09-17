<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('admin/admin_model', 'adminModel');
        $this->load->model('dosen/dosen_model', 'dosenModel');
        $this->load->model('mahasiswa/mahasiswa_model', 'mahasiswaModel');
        $this->load->model('validasikhs/validasikhs_model', 'validasikhsModel');
        $this->load->model('validasikrs/validasikrs_model', 'validasikrsModel');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $email = $this->session->userdata('email');
        $data['user'] = $this->adminModel->getDataUser($email)->row_array();
        $data['dataDosen'] = $this->dosenModel->getData()->result_array();
        $data['dataMahasiswa'] = $this->mahasiswaModel->getData()->result_array();
        $data['dataValidasiKrs'] = $this->validasikrsModel->getData()->result_array();
        $data['dataValidasiKhs'] = $this->validasikhsModel->getData()->result_array();

        $this->load->view('templates/templateadmin/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templateadmin/header_menu', $data);
        $this->load->view('templates/templateadmin/navbar_menu', $data);
        $this->load->view('admin/dashboardpage/view_index', $data);
        $this->load->view('templates/templateadmin/main_footer');
    }

    public function user()
    {
        $data['title'] = 'User Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->adminModel->getDataUser($email)->row_array();

        $data['peserta'] = $this->adminModel->getUser()->result_array();
        $data['role'] = $this->adminModel->getRole()->result_array();

        $this->load->view('templates/templateadmin/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templateadmin/header_menu', $data);
        $this->load->view('templates/templateadmin/navbar_menu', $data);
        $this->load->view('admin/usermanagementpage/view_user', $data);
        $this->load->view('templates/templateadmin/main_footer');
    }
}
