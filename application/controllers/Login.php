<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('googlefunction');
    }

    public function index()
    {
        $data = array('loginUrl' => $this->googlefunction->getLoginUrl());
        $this->session->set_userdata('loginUrl', $data['loginUrl']);
        $this->load->view('template/header');
        $this->load->view('auth/vw_login', $data);
        $this->load->view('template/footer');
    }

    function cek_emails($email)
	{
		$cek = $this->User_model->cek_email($email);
		return $cek;
	}

    public function oauth()
    {
        //cek code yang dikirim dari google
        $code = $this->input->get('code', TRUE);
        $login = $this->googlefunction->login($code);
        if ($login) {
            //cek apakah email yang login terdaftar di database pegawai
            $user = $this->googlefunction->getUserInfo();
            $parameter = [
                'id' => $user->email,
                'ws_user' => '9G637Ruk86y'
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://pegawai.pcr.ac.id/services/get_pegawai');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameter);
            $tmp = json_decode(curl_exec($ch));
            curl_close($ch);
            $resp =  $tmp && $tmp->status == true ? $tmp->data : FALSE;

            if ($resp) {
                //apabila pegawai ditemukan, cek email simpan session 
                
                // $this->session->set_userdata('nama', $resp->nama);
                // $this->session->set_userdata('email', $resp->email);
                // TODO: ambil role untuk email $resp->email lalu simpan di session
                $cek = $this->User_model->cek_email($resp->email);
                if($cek){
                    $data = [
                        'email' => $resp->email,
                        'role' => $cek['role']
                    ];
                }else{
                    $data = [
                        'email' => $resp->email,
                        'role' => '2'
                    ];
                }
                
                $this->session->set_userdata($data);
                
                redirect(base_url('kegiatan'));
            } else {
                //apabila pegawai tidak ditemukan, redirect ke halaman login
                $this->session->set_flashdata('flash_message', 'Anda tidak termasuk dalam pengguna sistem ini');
                redirect(base_url('login'));
            }
        }
    }

    public function cek_login()
    {
        //Mengambil email dan password
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        

        //Mengambil data user berdasarkan email untuk menentukan apakah usernya ada 
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $data = [
            'email' => $user['email'],
            'role' => $user['role'],
            'id' => $user['id']
        ]; //Membuat data untuk Session

        if ($user) { //Jika ada
            if($user['role'] == '1' || $user['role'] == '5' )
            {
                echo "<script> alert('Jangan ByPass'); document.location.href = '" . base_url('login') . "';</script>";
            }else 
            if (password_verify($this->input->post('password'), $user['password'])) { //Mencocokkan password yang di input dengan yang ada di db
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id'],
                    'nama' => $user['nama']
                ]; //Membuat data untuk Session

                $this->session->set_userdata($data); //Membuat session Login
                redirect('kegiatan');
            } else { // Jika data salah password
                echo "<script> alert('password anda salah'); document.location.href = '" . base_url('login') . "';</script>";
            }
        } else { //Jika email salah
            echo "<script> alert('email tidak ditemukan'); document.location.href = '" . base_url('login') . "';</script>";
        }
    }

    // public function cek_login()
    // {
    //     $email=$this->input->post("email");
    //     $password=$this->input->post("password");
    //     $cek_login=$this->User_Model->login($email,$password);

    //         if (empty($cek_login)){
    //             echo '<script>alert("email atau Password yang Anda masukan salah.");window.location.href="'.base_url('/index.php/login').'";</script>';
    //         }
    //         else{
    //             $this->session->set_userdata('user', $cek_login);
    //                if($this->session->userdata('user')->role =='1'){
    //                $this->session->set_userdata('user', $cek_login);                   
    //                redirect('kegiatan/');
    //                }else if($this->session->userdata('user')->role =='2' ){
    //                    $this->session->set_userdata('user', $cek_login);
    //                    redirect('kegiatan/');
    //                }else{
    //                 echo '<script>alert("Terjadi Kesalahan.");window.location.href="'.base_url('/index.php/login').'";</script>';
    //                }
    //         }
    // }

    // public function proses_register()
    // {
    //     $this->load->library('form_validation');
    //     $this->load->library('session');

    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     $this->form_validation->set_rules('email', 'email', 'required|min_length[5]|max_length[50]|is_unique[user.email]');
    //     $this->form_validation->set_rules('password', 'Password', 'required|trim');
    //     $this->form_validation->set_rules('insitutIn', 'Institut', 'required');


    //     if ($this->form_validation->run() == FALSE) {
    //     } else {
    //         $email = $this->input->post('email');
    //         $nama = $this->input->post('nama');
    //         $institut = $this->input->post('institut');
    //         $password = $this->input->post('password');
    //         $pass = password_hash($password, PASSWORD_DEFAULT);
    //         $role = 2;
    //         $data = [
    //             'nama' => $nama,
    //             'role' => $role,
    //             'institut' => $institut,
    //             'email' => $email,
    //             'password' => $pass,
    //         ];
    //         $insert = $this->User_Model->register("user", $data);
    //         if ($insert) {
    //             echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="' . base_url('/index.php/login') . '";</script>';
    //         }
    //     }
    // }

    public function registration()
    {
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('nama', 'Nama', 'required', 
                array('required' => 'Nama Wajib Di Isi'));
        $this->form_validation->set_rules('email', 'email', 'required|min_length[5]|max_length[50]|is_unique[user.email]', 
                array('required' => 'email Wajib Di Isi', 'is_unique' => 'Email Sudah terdaftar'));
        $this->form_validation->set_rules('password', 'Password', 'required|trim', 
                array('required' => 'Password Wajib Di Isi'));
        $this->form_validation->set_rules('institutIn', 'Institut', 'required',
                array('required' => 'Institut Wajib Di Isi'));


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('auth/regis');
            $this->load->view('template/footer');
        } else {
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $cek_institut = $this->input->post('institutIn');
            if($cek_institut == "Politeknik Caltex Riau")
            {   
                $institut = $cek_institut;
                $role = 3;
            }else{
                $institut = $this->input->post('institutOut');
                $role = 4;
            }
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'nama' => $nama,
                'role' => $role,
                'institut' => $institut,
                'email' => $email,
                'password' => $pass,
            ];
            // print_r($data); die;
            $insert = $this->User_Model->register("user", $data);
            if ($insert) {
                echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="' . base_url('/index.php/login') . '";</script>';
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>alert("Sukses! Anda berhasil logout."); window.location.href="' . base_url('/index.php/login') . '";
        </script>';
    }
}
