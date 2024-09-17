<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasikhs_model extends CI_Model
{
  public function getData()
  {
    $this->db->select('a.*');
    $this->db->where('a.delete_sts', 0);
    $this->db->from('validasikhs a');

    $result = $this->db->get();
    return $result;
  }

  public function insertData($data)
  {
    $this->db->insert('validasikhs', $data);
  }

  public function updateData($id, $data)
  {
    $this->db->where('id_validasikhs', $id);
    $this->db->update('validasikhs', $data);
  }

  public function checkDataUpload($id)
  {
    $this->db->select('a.*');
    $this->db->where('a.id_khs', $id);
    $this->db->from('validasikhs a');

    $result = $this->db->get();
    return $result;
  }
}
