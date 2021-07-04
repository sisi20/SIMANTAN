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
        // $response = $this->_client->request('GET', 'kegiatan', [
        //     'query' => [
        //         'BPF-TI' => 'bpftiabcde'
        //     ]
        // ]);
        // $result = json_decode($response->getBody()->getContents(), true);
        // return $result['data'];
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
        $this->db->update($this->table,array('status'=>'1'), array('id'=>'1'));
    }
}
