<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{
  public function getData()
  {
    $this->db->select('a.*');
    $this->db->where('a.delete_sts', 0);
    $this->db->from('fakultas a');

    $result = $this->db->get();
    return $result;
  }

  public function insertData($data)
  {
    $this->db->insert('fakultas', $data);
  }

  public function updateData($id, $data)
  {
    $this->db->where('id_fakultas', $id);
    $this->db->update('fakultas', $data);
  }

  public function deleteData($id)
  {
  }
}
