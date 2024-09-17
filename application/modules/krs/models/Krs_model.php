<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs_model extends CI_Model
{
  public function getData()
  {
    // $this->db->select('a.*');
    // $this->db->where('a.delete_sts', 0);
    // $this->db->from('krs a');

    // $result = $this->db->get();
    // return $result;
    // $this->db->select('a.*,b.file_upload file_validasi');
    // $this->db->where('a.delete_sts', 0);
    // $this->db->from('krs a');
    // $this->db->join('validasikrs b', 'b.id_krs = a.id_krs', 'left');

    $this->db->select('a.*,b.file_upload file_validasi');
    $this->db->where('a.delete_sts', 0);
    $this->db->from('krs a');
    $this->db->join('validasikrs b', 'b.id_krs = a.id_krs', 'left');
    $this->db->join('user c', 'c.id_user = a.id_user', 'left');
    $this->db->join('mahasiswa d', 'd.email = c.email');
    $this->db->join('pembimbing e', 'e.id_mahasiswa = d.id_mahasiswa');
    $this->db->join('dosen f', 'f.id_dosen = e.id_dosen');

    $result = $this->db->get();
    return $result;
  }

  public function getDataById($id)
  {
    $this->db->select('a.*,b.file_upload file_validasi');
    $this->db->where('a.id_user', $id);
    $this->db->from('krs a');
    $this->db->join('validasikrs b', 'b.id_krs = a.id_krs', 'left');

    $result = $this->db->get();
    return $result;
  }

  public function insertData($data)
  {
    $this->db->insert('krs', $data);
  }

  public function updateData($id, $data)
  {
    $this->db->where('id_krs', $id);
    $this->db->update('krs', $data);
  }
}
