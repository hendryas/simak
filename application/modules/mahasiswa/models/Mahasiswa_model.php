<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
  public function getData()
  {
    $this->db->select('a.*');
    $this->db->where('a.delete_sts', 0);
    $this->db->from('mahasiswa a');

    $result = $this->db->get();
    return $result;
  }

  public function getDataDesc()
  {
    $this->db->select('a.*');
    $this->db->where('a.delete_sts', 0);
    $this->db->from('mahasiswa a');
    $this->db->order_by('a.id_mahasiswa', 'desc');
    $this->db->limit(1);

    $result = $this->db->get();
    return $result;
  }

  public function insertData($data)
  {
    $this->db->insert('mahasiswa', $data);
  }

  public function insertDataPembimbing($data)
  {
    $this->db->insert('pembimbing', $data);
  }

  public function updateData($id, $data)
  {
    $this->db->where('id_mahasiswa', $id);
    $this->db->update('mahasiswa', $data);
  }
}
