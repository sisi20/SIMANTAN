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
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('auth/vw_login');
        $this->load->view('template/footer');
    }

    public function cek_login()
    {
        //Mengambil username dan password
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        //Mengambil data user berdasarkan email untuk menentukan apakah usernya ada 
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        $data = [
            'username' => $user['username'],
            'role' => $user['role'],
            'id' => $user['id']
        ]; //Membuat data untuk Session

        if ($user) { //Jika ada
            if (password_verify($this->input->post('password'), $user['password'])) { //Mencocokkan password yang di input dengan yang ada di db
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'id' => $user['id']
                ]; //Membuat data untuk Session

                $this->session->set_userdata($data); //Membuat session Login
                redirect('kegiatan');
            } else { // Jika data salah password
                echo "<script> alert('password anda salah'); document.location.href = '" . base_url('login') . "';</script>";
            }
        } else { //Jika Username salah
            echo "<script> alert('Username tidak ditemukan'); document.location.href = '" . base_url('login') . "';</script>";
        }
    }

    function buatSession($id)
    {
        $data = $this->User_Model->get_by_id($id);
        $this->session->set_userdata($data);
        redirect('kegiatan');
    }

    // public function cek_login()
    // {
    //     $username=$this->input->post("username");
    //     $password=$this->input->post("password");
    //     $cek_login=$this->User_Model->login($username,$password);

    //         if (empty($cek_login)){
    //             echo '<script>alert("Username atau Password yang Anda masukan salah.");window.location.href="'.base_url('/index.php/login').'";</script>';
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

    public function proses_register()
    {
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth/regis');
        } else {
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $role = $this->input->post('role');
            $data = [
                'nama' => $nama,
                'role' => $role,
                'username' => $username,
                'password' => $pass,
            ];
            $insert = $this->User_Model->register("user", $data);
            if ($insert) {
                echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="' . base_url('/index.php/login') . '";</script>';
            }
        }
    }

    public function registration()
    {

        $this->load->view('template/header');
        $this->load->view('auth/regis');
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>alert("Sukses! Anda berhasil logout."); window.location.href="' . base_url('/index.php/login') . '";
        </script>';
    }
}
