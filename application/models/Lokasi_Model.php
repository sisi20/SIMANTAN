<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{
    public $tabel = "lokasi";
    public $id = "lokasi.id";

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $query = $this->db->get($this->tabel);
        return $query->result_array();
    }

    public function get_by_id($kegiatan)
    {
        $this->db->select('k.*');
        $this->db->from('lokasi k');
        $this->db->where('k.id_kegiatan', $kegiatan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->tabel, $data);
    }

}
