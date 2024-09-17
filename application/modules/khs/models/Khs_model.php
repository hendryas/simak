<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Khs_model extends CI_Model
{
  public function getData()
  {
    // $this->db->select('a.*');
    // $this->db->where('a.delete_sts', 0);
    // $this->db->from('khs a');

    // $result = $this->db->get();
    // return $result;
    // $this->db->select('a.*,b.file_upload file_validasi');
    // $this->db->where('a.delete_sts', 0);
    // $this->db->from('khs a');
    // $this->db->join('validasikhs b', 'b.id_khs = a.id_khs', 'left');

    $this->db->select('a.*,b.file_upload file_validasi');
    $this->db->where('a.delete_sts', 0);
    $this->db->where('a.delete_sts', 0);
    $this->db->from('khs a');
    $this->db->join('validasikhs b', 'b.id_khs = a.id_khs', 'left');
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
    $this->db->from('khs a');
    $this->db->join('validasikhs b', 'b.id_khs = a.id_khs', 'left');

    $result = $this->db->get();
    return $result;
  }

  public function insertData($data)
  {
    $this->db->insert('khs', $data);
  }

  public function updateData($id, $data)
  {
    $this->db->where('id_khs', $id);
    $this->db->update('khs', $data);
  }
}
