<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuLevel3 extends CI_Controller
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
        $data['title'] = 'Submenu Management (Level 3)';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Menu_model->getDataUser($email)->row_array();

        $data['subMenu'] = $this->Menu_model->getSubMenu()->result_array();
        $data['has_sub_menu'] = $this->Menu_model->getDataUserHasSubMenu()->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Field title submenu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('has_sub_menu_id', 'SubMenu Level 2', 'required', [
            'required' => 'Field submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'Field url submenu tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('icon', 'Menu', 'required', [
            'required' => 'Field icon submenu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/menumanagementpage/menulevel3page/view_hassubmenu', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title')),
                'has_sub_menu_id' => htmlspecialchars($this->input->post('has_sub_menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'icon' => htmlspecialchars($this->input->post('icon')),
                'is_active' => htmlspecialchars($this->input->post('is_active')),
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->Menu_model->insertDataUserSubMenu($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Submenu baru telah ditambahkan!</strong></div>');
            redirect('master/menulevel3');
        }
    }

    public function editMenuLevel3()
    {
        $id = $this->input->post('id');
        $has_sub_menu_id = $this->input->post('has_sub_menu_id');

        $data = [
            'title' => htmlspecialchars($this->input->post('title')),
            'has_sub_menu_id' => $has_sub_menu_id,
            'url' => htmlspecialchars($this->input->post('url')),
            'icon' => htmlspecialchars($this->input->post('icon')),
            'is_active' => htmlspecialchars($this->input->post('is_active')),
            'date_created' => date('Y-m-d H:i:s')
        ];

        $this->Menu_model->updateDataUserSubMenu($id, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data submenu telah diubah!</strong></div>');
        redirect('master/menulevel3');
    }

    public function deleteMenuLevel3($menu_id)
    {
        $menu_id = decrypt_url($menu_id);
        $this->Menu_model->deleteDataSubmenu($menu_id);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data submenu telah dihapus!</strong></div>');
        redirect('master/menulevel3');
    }
}
