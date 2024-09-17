<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('HistoryAdmin_model');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Halaman History';
        $email = $this->session->userdata('email');
        $data['user'] = $this->HistoryAdmin_model->getDataUser($email)->row_array();
        $data['staff'] = $this->HistoryAdmin_model->getDataStaff()->result_array();

        $data['order'] = $this->HistoryAdmin_model->getDataOrder()->result_array();
        $data['order_di_proses'] = $this->HistoryAdmin_model->getDataOrderDiProses()->result_array();
        $data['order_menuju_ke_lokasi'] = $this->HistoryAdmin_model->getDataOrderMenujuKeLokasi()->result_array();
        $data['order_selesai'] = $this->HistoryAdmin_model->getDataOrderSelesai()->result_array();
        // var_dump($data['staff']);
        // die;

        $this->load->view('templates/templateadmin/main_header', $data);
        $this->load->view('templates/loaders/loader');
        $this->load->view('templates/templateadmin/header_menu', $data);
        $this->load->view('templates/templateadmin/navbar_menu', $data);
        $this->load->view('admin/historypage/view_history', $data);
        $this->load->view('templates/templateadmin/main_footer');
    }

    public function proses($kode)
    {
        $kode = decrypt_url($kode);
        $id_staff = $this->input->post('id_staff');

        $data = [
            'status_order' => 1,
            'id_staff' => $id_staff
        ];

        $this->HistoryAdmin_model->updateDataOrder($data, $kode);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Order Berhasil di Proses!</div>');
        redirect('admin/history');
    }

    public function menujuKeLokasi($kode)
    {
        $kode = decrypt_url($kode);
        $data = [
            'status_order' => 2,
        ];

        $this->HistoryAdmin_model->updateDataOrderProsesKeLokasi($data, $kode);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
       Order Berhasil di Proses Menuju ke Lokasi Tujuan!</div>');
        redirect('admin/history');
    }
}
