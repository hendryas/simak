<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('auth/Auth_model', 'authModel');
        $this->load->model('dosen/Dosen_model', 'dosenModel');
        $this->load->model('mahasiswa/Mahasiswa_model', 'mahasiswaModel');
    }

    public function index()
    {
        //ini untuk menghindari jika kembali ke auth,untuk tiap rolenya nanti di tambahkan jika perlu
        if ($this->session->userdata('id_role') == 1) {
            redirect('superadmin');
        } elseif ($this->session->userdata('id_role') == 2) {
            redirect('admin');
        } elseif ($this->session->userdata('id_role') == 3) {
            redirect('staff');
        } elseif ($this->session->userdata('id_role') == 4) {
            redirect('customer');
        }

        $this->form_validation->set_rules('name', 'Nama', 'required|trim', [ //bener
            'required' => 'Nama tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [ //bener
            'required' => 'Tanggal lahir tidak boleh kosong.',
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim', [ //bener
            'required' => 'Gender tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [ //bener
            'required' => 'Email tidak boleh kosong.',
            'valid_email' => 'Silahkan tuliskan Alamat Email dengan benar.'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|min_length[10]|is_unique[user.phone]', [ //bener
            'required' => 'No. Handhphone tidak boleh kosong.',
            'is_unique' => 'No. Handhphone ini sudah terdaftar.',
            'min_length' => 'No. Handhphone terlalu pendek!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [ //bener
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [ //bener
            'required' => 'Password tidak boleh kosong.',
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $data['dataDosen'] = $this->dosenModel->getData()->result_array();

            $this->load->view('templates/templateauth/auth_header', $data);
            $this->load->view('auth/registerpage/view_index');
            $this->load->view('templates/templateauth/auth_footer');
        } else {
            $name = $this->input->post('name');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $email = $this->input->post('email');
            $gender = $this->input->post('gender');
            $nim = $this->input->post('nim');
            $dosen = $this->input->post('dosen');
            $phone = $this->input->post('phone');
            $tahun_masuk = $this->input->post('tahun_masuk');
            $foto =  $_FILES['foto']['name'];
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $id_role = 4;
            $is_active = 1;
            $date_created = date('Y-m-d H:i:s');

            $his    = date("His");
            $thbl   = date("Ymd");

            $dname = explode(".", $_FILES['foto']['name']);
            $ext = end($dname);
            $new_image = $_FILES['foto']['name'] = strtolower('foto_mhs' . '_' . $thbl . '-' . $his . '.' . $ext);

            if ($foto != null) {
                $file_name1 = 'foto_mhs' . '_' . $thbl . '-' . $his;
                $config1['upload_path']          = './assets/img/mhs/';
                // $config1['allowed_types']        = 'doc|docx|pdf';
                $config1['allowed_types']        = 'jpg|png|jpeg';
                $config1['max_size']             = 3023;
                $config1['remove_space']         = TRUE;
                $config1['file_name']            = $file_name1;

                $this->load->library('upload', $config1);

                if ($this->upload->do_upload('foto')) {
                    $this->upload->data();

                    $data = [
                        'name' => $name,
                        'date_of_birth' => $tgl_lahir,
                        'gender' => $gender,
                        'phone' => $phone,
                        'username' => "",
                        'email' => $email,
                        'password' => $password,
                        'id_role' => $id_role,
                        'is_active' => $is_active,
                        'date_created' => $date_created,
                        'delete_sts' => 0,
                    ];

                    $data2 = [
                        'nama' => $name,
                        'email' => $email,
                        'no_hp' => $phone,
                        'nim' => $nim,
                        'tahun_masuk' => $tahun_masuk,
                        'foto' => $new_image,
                        'date_created' => $date_created,
                        'delete_sts' => 0,
                    ];

                    $this->mahasiswaModel->insertData($data2);
                    $dataMahasiswa = $this->mahasiswaModel->getDataDesc()->row_array();
                    $id_mahasiswa = $dataMahasiswa['id_mahasiswa'];

                    $dataPembimbing = [
                        'id_dosen' => $dosen,
                        'id_mahasiswa' => $id_mahasiswa,
                        'date_created' => $date_created,
                        'delete_sts' => 0,
                    ];

                    $this->mahasiswaModel->insertDataPembimbing($dataPembimbing);

                    // siapkan token
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time()
                    ];

                    $this->authModel->insertDataUser($data);
                    $this->authModel->insertDataUserToken($user_token);

                    //Setelah data masuk,Kirim email activasi
                    // $this->_sendEmail($token, 'verify', $name);

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                    <strong>Selamat akun anda sudah di buat!</strong></div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                <strong>Data gagal telah ditambahkan!</strong></div>');
                redirect('auth/login');
            }
        }
    }

    public function verify()
    {
        //ambil email dari URL
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->authModel->getDataUser($email)->row_array();

        if ($user) {

            $user_token = $this->authModel->getDataUserToken($token)->row_array();

            if ($user_token) {
                //di beri waktu 1 hari
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

                    $this->authModel->updateDataUserActive($email);

                    $this->authModel->deleteDataUserToken($email);

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">' . $email . ' berhasil di aktivasi! Silahkan login.</div>');
                    redirect('auth/login');
                } else {

                    $this->authModel->deleteDataUser($email);

                    $this->authModel->deleteDataUserToken($email);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                        <strong>Token expired! </strong> Aktivasi akunmu gagal.</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    <strong>Salah token! </strong> Aktivasi akunmu gagal.</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Salah email! </strong> Aktivasi akunmu gagal.</div>');
            redirect('auth/login');
        }
    }
}
