<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getUser()
    {
        $this->db->select('');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id=user.id_role');
        $this->db->order_by("role", "asc");
        $this->db->order_by("date_created", "asc");
        $query = $this->db->get();
        return $query;
    }

    public function getRole()
    {
        $this->db->select('');
        $this->db->from('user_role');
        $query = $this->db->get();
        return $query;
    }

    public function deleteDataUser($nik)
    {
        $data['peserta'] = $this->db->get_where('user', ['nik' => $nik])->row_array();

        $this->db->where('nik', $nik);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data User berhasil dihapus!</strong></div>');
        redirect('master/user');
    }

    public function editDataUser()
    {
        $nik = $this->input->post('nik');

        $data = [
            'id_role' => htmlspecialchars($this->input->post('id_role')),
        ];

        $this->db->where('nik', $nik);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data User telah diubah!</strong></div>');
        redirect('master/user');
    }
}
