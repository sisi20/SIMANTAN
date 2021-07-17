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
        // $this->db->select('k.,u.nama as nama');
        $this->db->select('k.*');
        $this->db->from('kegiatan k');
        // $this->db->join('user u','k.penanggung_jawab=u.id');
        $this->db->order_by('acara_mulai desc');
        // $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($kegiatan)
    {
        // $this->db->select('k., u.nama as user, b.nama as nama_pengaju');
        $this->db->select('k.*');
        $this->db->from('kegiatan k');
        // $this->db->join('user u', 'u.id = k.penanggung_jawab');
        // $this->db->join('user b', 'b.id = k.pengaju');
        $this->db->where('k.id', $kegiatan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function gantiStatus($id, $where)
    {
        $this->db->update($this->table, $where, array('id' => $id));
    }

    public function update($where, $data)
    {
        // print_r($data);die;
        $this->db->update($this->table, $data, $where);
    }
}
