<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar_model extends CI_Model
{
    public $tabel = "komentar";
    public $id = "komentar.id";

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
        //SELECT k.*, u.nama FROM komentar k, user u WHERE k.user = u.id AND k.kegiatan = 1
        $this->db->select('k.*, u.nama as user');
        $this->db->from('komentar k');
        $this->db->join('user u', 'u.id = k.user');
        $this->db->where('k.kegiatan', $kegiatan);
        $this->db->order_by('tanggal asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->tabel, $data);
    }

}
