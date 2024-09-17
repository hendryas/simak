<?php
class ProgramStudi_model extends CI_Model
{
  public function getData()
  {
    $this->db->select('a.*,b.nama_fakultas');
    $this->db->where('a.delete_sts', 0);
    $this->db->join('fakultas b', 'a.id_fakultas = b.id_fakultas', 'left');
    $this->db->from('program_studi a');

    $result = $this->db->get();
    return $result;
  }

  public function insertData($data)
  {
    $this->db->insert('program_studi', $data);
  }

  public function updateData($id, $data)
  {
    $this->db->where('id_program_studi', $id);
    $this->db->update('program_studi', $data);
  }
}
