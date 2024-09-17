<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('Role_model');
    }

    public function index()
    {
        $data['title'] = 'Role';

        $email = $this->session->userdata('email');
        $data['user'] = $this->Role_model->getDataUser($email)->row_array();

        $data['role'] = $this->Role_model->getDataRole()->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|trim', [
            'required' => 'Field role tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templateadmin/main_header', $data);
            $this->load->view('templates/loaders/loader');
            $this->load->view('templates/templateadmin/header_menu', $data);
            $this->load->view('templates/templateadmin/navbar_menu', $data);
            $this->load->view('admin/rolepage/view_role', $data);
            $this->load->view('templates/templateadmin/main_footer');
        } else {
            $data = [
                'role' => htmlspecialchars($this->input->post('role'))
            ];

            $this->Role_model->insertDataUser($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Role baru telah ditambahkan!</strong></div>');
            redirect('admin/role');
        }
    }

    public function editRole()
    {
        $id = $this->input->post('id');

        $data = [
            'role' => htmlspecialchars($this->input->post('role_edit'))
        ];

        $this->Role_model->updateDataRole($id, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data role telah diubah!</strong></div>');
        redirect('admin/role');
    }

    public function roleAccess($id_role)
    {
        $data['title'] = 'Role Access';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Role_model->getDataUser($email)->row_array();

        $id_role = decrypt_url($id_role);

        $data['role'] = $this->Role_model->getDataRoleById($id_role)->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/templateadmin/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templateadmin/header_menu', $data);
        $this->load->view('templates/templateadmin/navbar_menu', $data);
        $this->load->view('admin/rolepage/view_roleaccess', $data);
        $this->load->view('templates/templateadmin/main_footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_idd = $this->input->post('roleId');
        $id_role = decrypt_url($role_idd);

        $data = [
            'role_id' => $id_role,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        //yang gak ada,menjadi ada 0 < 1
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        // $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        // <strong>Access telah di ubah!</strong> </div>');
    }
}
