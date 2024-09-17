<?php
class Auth_model extends CI_Model
{
    public function getDataUserDosen($email)
    {
        $this->db->select('a.*,b.nim,b.tahun_masuk,b.foto,d.nama');
        $this->db->from('user a');
        $this->db->join('mahasiswa b', 'b.email = a.email');
        $this->db->join('pembimbing c', 'c.id_mahasiswa = b.id_mahasiswa');
        $this->db->join('dosen d', 'd.id_dosen = c.id_dosen');
        $this->db->where('a.email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataProfileDosen($email)
    {
        $this->db->select('a.*,b.nip,b.nidn,b.foto');
        $this->db->from('user a');
        $this->db->join('dosen b', 'b.email = b.email');
        $this->db->where('a.email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataDosenMahasiswa($email)
    {
        $this->db->select('a.*,b.progdi,b.status,b.pendidikan_tertinggi,b.foto,d.tahun_masuk,d.nama,d.nim');
        $this->db->from('user a');
        $this->db->join('dosen b', 'b.email = a.email');
        $this->db->join('pembimbing c', 'c.id_dosen = b.id_dosen');
        $this->db->join('mahasiswa d', 'd.id_mahasiswa = c.id_mahasiswa');
        $this->db->where('b.email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataUser($email)
    {
        $this->db->select('a.*');
        $this->db->from('user a');
        $this->db->where('a.email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataUserActive($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('is_active', 1);

        $result = $this->db->get();
        return $result;
    }

    public function getDataUserToken($token)
    {
        $this->db->select('user_token.*');
        $this->db->from('user_token');
        $this->db->where('token', $token);

        $result = $this->db->get();
        return $result;
    }

    public function updateDataUserPassword($password, $email)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function updateDataUserActive($email)
    {
        $this->db->set('is_active', 1);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function insertDataUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function insertDataUserToken($user_token)
    {
        $this->db->insert('user_token', $user_token);
    }

    public function deleteDataUserToken($email)
    {
        $this->db->delete('user_token', ['email' => $email]);
    }

    public function deleteDataUser($email)
    {
        $this->db->delete('user', ['email' => $email]);
    }
}
