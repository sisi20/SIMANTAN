<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public $tabel = "user";
    public $id = "user.id";

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $query = $this->db->get($this->tabel);
        return $query->result_array();
    }

    public function get_by_id($id)
    {
        $query = $this->db->get_where($this->tabel, array('id' => $id));
        return $query->row_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->tabel, $data, $where);
    }

    public function insert($data)
    {
        $this->db->insert($this->tabel, $data);
    }

    public function delete($id)
    {
        $this->db->delete($this->tabel, array('id' => $id));
    }

    public function login($username, $password){
        return $this->db->query("select * from user
        Where username='".$username."' AND password='".$password."'")->row();
    }

}
