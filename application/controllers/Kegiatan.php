<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kegiatan_model");
        //$this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view("kegiatan/vw_kegiatan");
    }

    function tambah(){
        $this->load->view("kegiatan/form_tambah");
    }
}
