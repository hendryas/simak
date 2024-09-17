<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataUserMenu()
    {
        $this->db->select('user_menu.*');
        $this->db->from('user_menu');

        $result = $this->db->get();
        return $result;
    }

    public function getSubMenu()
    {
        $this->db->select('usm.id,usm.has_sub_menu_id,usm.title,usm.url,usm.icon,usm.is_active');
        $this->db->select('uhsm.title title2');
        $this->db->from('user_sub_menu usm');
        $this->db->join('user_has_sub_menu uhsm', 'uhsm.id = usm.has_sub_menu_id');

        $query = $this->db->get();
        return $query;
    }

    public function getHasSubMenu()
    {
        $this->db->select('user_has_sub_menu.*');
        $this->db->select('user_menu.menu');
        $this->db->from('user_has_sub_menu');
        $this->db->join('user_menu', 'user_menu.id = user_has_sub_menu.menu_id');

        $query = $this->db->get();
        return $query;
    }

    public function getDataUserHasSubMenu()
    {
        $this->db->select('user_has_sub_menu.*');
        $this->db->from('user_has_sub_menu');

        $result = $this->db->get();
        return $result;
    }

    public function insertDataUserMenu($data)
    {
        $this->db->insert('user_menu', $data);
    }

    public function insertDataUserHasSubMenu($data)
    {
        $this->db->insert('user_has_sub_menu', $data);
    }

    public function insertDataUserSubMenu($data)
    {
        $this->db->insert('user_sub_menu', $data);
    }

    public function updateDataUserMenu($menu_id, $data)
    {
        $this->db->where('id', $menu_id);
        $this->db->update('user_menu', $data);
    }

    public function updateDataUserSubMenu($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }

    public function updateDataUserHasSubMenu($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user_has_sub_menu', $data);
    }

    public function deleteDataMenu($menu_id)
    {
        $this->db->where('id', $menu_id);
        $this->db->delete('user_menu');
    }

    public function deleteDataHasSubmenu($menu_id)
    {
        $this->db->where('id', $menu_id);
        $this->db->delete('user_has_sub_menu');
    }

    public function deleteDataSubmenu($menu_id)
    {
        $this->db->where('id', $menu_id);
        $this->db->delete('user_sub_menu');
    }
}
