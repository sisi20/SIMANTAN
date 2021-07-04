<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    public $table = 'kegiatan';
    public $id = 'kegiatan.id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->select('k.*,u.nama as nama');
        $this->db->from('kegiatan k');
        $this->db->join('user u', 'k.penanggung_jawab=u.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
