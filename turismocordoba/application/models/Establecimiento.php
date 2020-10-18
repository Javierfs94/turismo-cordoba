<?php

class Establecimiento extends CI_Model
{
    public $table = "establecimientos";
    public $table_id = "id";

	function display_records()
	{
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->join("empresas","empresas.id = establecimientos.id_empresa");
        $this->db->join("users","users.user_id = establecimientos.id_usuario");
        $query = $this->db->get();
        return $query->result();
	}
}
