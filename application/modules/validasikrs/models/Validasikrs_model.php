<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasikrs_model extends CI_Model
{
  public function getData()
  {
    $this->db->select('a.*');
    $this->db->where('a.delete_sts', 0);
    $this->db->from('validasikrs a');

    $result = $this->db->get();
    return $result;
  }

  public function insertData($data)
  {
    $this->db->insert('validasikrs', $data);
  }

  public function updateData($id, $data)
  {
    $this->db->where('id_validasikrs', $id);
    $this->db->update('validasikrs', $data);
  }

  public function checkDataUpload($id)
  {
    $this->db->select('a.*');
    $this->db->where('a.id_krs', $id);
    $this->db->from('validasikrs a');

    $result = $this->db->get();
    return $result;
  }
}
