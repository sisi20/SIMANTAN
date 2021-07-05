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
        //$this->db->from($this->table);
        //$query = $this->db->get();
        //return $query->result_array();
        $this->db->select('k.*,u.nama as nama');
        $this->db->from('kegiatan k');
        $this->db->join('user u','k.penanggung_jawab=u.id');   
        $this->db->order_by('waktu desc');
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
        //SELECT k.*, u.nama FROM komentar k, user u WHERE k.user = u.id AND k.kegiatan = 1
        $this->db->select('k.*, u.nama as user');
        $this->db->from('kegiatan k');
        $this->db->join('user u', 'u.id = k.penanggung_jawab');
        $this->db->where('k.id', $kegiatan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function gantiStatus($id)
    {
        $this->db->update($this->table,array('status'=>'1'), array('id'=>$id));
    }
}
