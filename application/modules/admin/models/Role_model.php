<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataRole()
    {
        $this->db->select('user_role.*');
        $this->db->from('user_role');
        $result = $this->db->get();
        return $result;
    }

    public function getDataRoleById($id_role)
    {
        $this->db->select('user_role.*');
        $this->db->from('user_role');
        $this->db->where('id', $id_role);
        $result = $this->db->get();
        return $result;
    }

    public function insertDataUser($data)
    {
        $this->db->insert('user_role', $data);
    }

    public function updateDataRole($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
    }
}
