<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuLevel2 extends CI_Controller
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
        $data['title'] = 'Submenu Management (Level 2)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['hassubmenu'] = $this->Menu_model->getHasSubMenu()->result_array();

        $data['menu'] = $this->Menu_model->getDataUserMenu()->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required', [
            'required' => 'Field title submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', [
            'required' => 'Field menu submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required', [
            'required' => 'Field url submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('icon', 'Menu', 'required', [
            'required' => 'Field icon submenu level 2 tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('status_sub', 'Status Level Submenu', 'required', [
            'required' => 'Field Status Submenu Level 2 tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('master/menumanagementpage/menulevel2page/view_submenu', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $data = [
                'menu_id' => htmlspecialchars($this->input->post('menu_id')),
                'title' => htmlspecialchars($this->input->post('title')),
                'url' => htmlspecialchars($this->input->post('url')),
                'icon' => htmlspecialchars($this->input->post('icon')),
                'is_active' => htmlspecialchars($this->input->post('is_active')),
                'status_sub' => htmlspecialchars($this->input->post('status_sub')),
                'date_created' => date('Y-m-d H:i:s')
            ];

            $this->Menu_model->insertDataUserHasSubMenu($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Submenu Level 2 baru telah ditambahkan!</strong></div>');
            redirect('master/menulevel2');
        }
    }

    public function editMenuLevel2()
    {
        $id = $this->input->post('id');
        $menu_id = $this->input->post('menu_id');

        $data = [
            'title' => htmlspecialchars($this->input->post('title')),
            'menu_id' => $menu_id,
            'url' => htmlspecialchars($this->input->post('url')),
            'icon' => htmlspecialchars($this->input->post('icon')),
            'is_active' => htmlspecialchars($this->input->post('is_active')),
            'status_sub' => htmlspecialchars($this->input->post('status_sub')),
            'date_created' => date('Y-m-d H:i:s')
        ];

        $this->Menu_model->updateDataUserHasSubMenu($id, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data submenu level 2 telah diubah!</strong></div>');
        redirect('master/menulevel2');
    }

    public function deleteMenuLevel2($hasSubMenu_id)
    {
        $menu_id = decrypt_url($hasSubMenu_id);
        $this->Menu_model->deleteDataHasSubmenu($menu_id);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data submenu level 2 telah dihapus!</strong></div>');
        redirect('master/menulevel2');
    }
}
