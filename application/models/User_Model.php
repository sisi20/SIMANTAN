  
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

    public function getStaff()
    {
        $parameter = [
            'ws_user' => '9G637Ruk86y'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pegawai.pcr.ac.id/services/get_pegawai');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameter);
        $tmp = json_decode(curl_exec($ch));
        curl_close($ch);
        $resp =  $tmp && $tmp->status == true ? $tmp->data : FALSE;
        // print_r($resp);die;
        return $resp;
    }

    public function cek_email($data)
    {
        $this->db->select('u.*');
        $this->db->from('user u');
        $this->db->where('email=',$data);
        $role = array('1', '2', '5');
        $this->db->where_in('role', $role);
        // $this->db->from($this->table);
        $query = $this->db->get();
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

    public function login($email, $password)
    {
        return $this->db->query("select * from user
        Where email='" . $email . "' AND password='" . $password . "'")->row();
    }

    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
