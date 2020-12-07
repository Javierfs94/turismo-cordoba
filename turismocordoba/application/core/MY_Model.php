<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function find($id)
	{
		$this->db->select();
		$this->db->from($this->table);
		$this->db->where($this->table_id, $id);

		$query = $this->db->get();
		return $query->row();
	}

	public function findAll()
	{
		$this->db->select();
		$this->db->from($this->table);

		$query = $this->db->get();
		return $query->result();
	}

	public function findAllArray($where = null, $con = null)
	{
		$this->db->select();
		$this->db->from($this->table);
		$this->db->where($where, $con);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		$this->db->where($this->table_id, $id);
		$this->db->update($this->table, $data);
	}
}
