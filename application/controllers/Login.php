<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
	}
 
	public function index()
	{
		$this->load->view('login/vw_login');
	}
 
	public function cek_login()
    {
        $username=$this->input->post("username");
        $password=$this->input->post("password");
        $cek_login=$this->User_Model->login($username,$password);

            if (empty($cek_login)){
             redirect('login');
            }
            else{
                $this->session->set_userdata('user', $cek_login);
                   if($this->session->userdata('user')->role =='1'){
                   $this->session->set_userdata('user', $cek_login);
                     redirect('kegiatan/');
                   }else if($this->session->userdata('user')->role =='2' ){
                       $this->session->set_userdata('user', $cek_login);
                       redirect('kegiatan/');

                   }else{
                       echo "Anda tidak berhak mengakses Website ini";
                   }
            }
    }
 
}
?>