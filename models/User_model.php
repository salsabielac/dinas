<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function login($nip,$password)
    {
        $this->db->select('id','nip','password');
        $this->db->from('user');
        $this->db->where('nip',$nip);
        $this->db->where('password',md5($password));

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }else{
            return false;
        }
    }
    
    public $table = 'user';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('id_jabatan', $q);
	$this->db->or_like('id_unit_kerja', $q);
	$this->db->or_like('id_golongan', $q);
	$this->db->or_like('uang_dinas', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('role', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('id_jabatan', $q);
	$this->db->or_like('id_unit_kerja', $q);
	$this->db->or_like('id_golongan', $q);
	$this->db->or_like('uang_dinas', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('role', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }



}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-15 18:52:13 */
/* http://harviacode.com */