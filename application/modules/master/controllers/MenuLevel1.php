<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuLevel1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Menu_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Menu Management (Level 1)';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Menu_model->getDataUser($email)->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->Menu_model->getDataUserMenu()->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Field URL menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('menu_nama', 'Nama Menu', 'required', [
            'required' => 'Field nama menu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/menumanagementpage/menulevel1page/view_menu', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $url_menu = htmlspecialchars($this->input->post('menu'));
            $nama_menu = htmlspecialchars($this->input->post('menu_nama'));
            $data = [
                'menu' => $url_menu,
                'menu_nama' => $nama_menu,
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->Menu_model->insertDataUserMenu($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Menu baru telah ditambahkan!</strong></div>');
            redirect('master/menulevel1');
        }
    }

    public function editMenuLevel1()
    {
        $menu_id = $this->input->post('id');

        $url_menu = htmlspecialchars($this->input->post('menu_edit'));
        $nama_menu = htmlspecialchars($this->input->post('menu_nama_edit'));
        $data = [
            'menu' => $url_menu,
            'menu_nama' => $nama_menu,
            'date_created' => date('Y-m-d H:i:s')
        ];

        $this->Menu_model->updateDataUserMenu($menu_id, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data menu telah diubah!</strong></div>');
        redirect('master/menulevel1');
    }

    public function deleteMenuLevel1($menu_id)
    {
        $menu_id = decrypt_url($menu_id);
        $this->Menu_model->deleteDataMenu($menu_id);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data menu telah dihapus!</strong></div>');
        redirect('master/menulevel1');
    }
}
