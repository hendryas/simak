<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
  public function getData()
  {
    $this->db->select('a.*');
    $this->db->where('a.delete_sts', 0);
    $this->db->from('dosen a');

    $result = $this->db->get();
    return $result;
  }

  // public function getData()
  // {
  //   $this->db->select('a.*');
  //   $this->db->where('a.delete_sts', 0);
  //   $this->db->where('a.id_role', 3);
  //   $this->db->from('user a');

  //   $result = $this->db->get();
  //   return $result;
  // }

  public function insertData($data)
  {
    $this->db->insert('dosen', $data);
  }

  public function updateData($id, $data)
  {
    $this->db->where('id_dosen', $id);
    $this->db->update('dosen', $data);
  }
}
