<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryAdmin_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataStaff()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('id_role', 3);

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrder()
    {
        $this->db->select('tbl_order.*');
        $this->db->select('user.name,email');
        $this->db->select('layanan.kode_jenis,nama_layanan,deskripsi');
        $this->db->select('rekap_pembayaran_customer.nama_rekening_customer,nama_bank_customer,no_rekening_customer,bukti_bayar_customer');
        $this->db->from('tbl_order');
        $this->db->where('status_order', 0);
        $this->db->join('user', 'user.id = tbl_order.id_customer');
        $this->db->join('layanan', 'layanan.kode = tbl_order.kode_layanan');
        $this->db->join('rekap_pembayaran_customer', 'rekap_pembayaran_customer.kode_order = tbl_order.kode');

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrderDiProses()
    {
        $this->db->select('tbl_order.*');
        $this->db->select('user.name,email');
        $this->db->select('layanan.kode_jenis,nama_layanan,deskripsi');
        $this->db->from('tbl_order');
        $this->db->where('status_order', 1);
        $this->db->join('user', 'user.id = tbl_order.id_customer');
        $this->db->join('layanan', 'layanan.kode = tbl_order.kode_layanan');

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrderMenujuKeLokasi()
    {
        $this->db->select('tbl_order.*');
        $this->db->select('user.name,email');
        $this->db->select('layanan.kode_jenis,nama_layanan,deskripsi');
        $this->db->from('tbl_order');
        $this->db->where('status_order', 2);
        $this->db->or_where('status_order', 3);
        $this->db->join('user', 'user.id = tbl_order.id_customer');
        $this->db->join('layanan', 'layanan.kode = tbl_order.kode_layanan');

        $result = $this->db->get();
        return $result;
    }

    public function getDataOrderSelesai()
    {
        $this->db->select('tbl_order.*');
        $this->db->select('user.name,email');
        $this->db->select('layanan.kode_jenis,nama_layanan,deskripsi');
        $this->db->from('tbl_order');
        $this->db->where('status_order', 4);
        $this->db->join('user', 'user.id = tbl_order.id_customer');
        $this->db->join('layanan', 'layanan.kode = tbl_order.kode_layanan');

        $result = $this->db->get();
        return $result;
    }

    public function updateDataOrder($data, $kode)
    {
        $this->db->where('kode', $kode);
        $this->db->update('tbl_order', $data);
    }

    public function updateDataOrderProsesKeLokasi($data, $kode)
    {
        $this->db->where('kode', $kode);
        $this->db->update('tbl_order', $data);
    }
}
