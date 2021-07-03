<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    public $table = 'mahasiswa';
    public $id = 'mahasiswa.id';
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        //$this->db->from($this->table);
        //$query = $this->db->get();
        //return $query->result_array();
        $response = $this->_client->request('GET', 'mahasiswa', [
            'query' => [
                'BPF-TI' => 'bpftiabcde'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
}
