<?php

class Oferta extends CI_Model
{
	function display_records()
	{
	$query=$this->db->query("SELECT * FROM ofertas INNER JOIN empresas ON empresas.id = ofertas.id_empresa");
	return $query->result();
	}
    function añadir_oferta()
    {
        $data = array(
            'id_empresa'  => $this->input->post('id_empresa'),
            'descripcion'  => $this->input->post('descripcion'),
			'tipo' => $this->input->post('tipo'),
			'codigos' => $this->input->post('codigos'),
        );
        $result = $this->db->insert('ofertas', $data);
        return $result;
    }

    function modificar_oferta()
    {
        $id_empresa = $this->input->post('id_empresa');
        $descripcion = $this->input->post('descripcion');
		$tipo = $this->input->post('tipo');
		$codigos = $this->input->post('codigos');

		$this->db->set('id_empresa', $id_empresa);
        $this->db->set('descripcion', $descripcion);
        $this->db->set('tipo', $tipo);
        $this->db->where('codigos', $codigos);
        $result = $this->db->update('ofertas');
        return $result;
    }

	function borrar_oferta()
    {
        $id_oferta = $this->input->post('id_oferta');
        $this->db->where('id', $id_oferta);
        $result = $this->db->delete('ofertas');
        return $result;
    }
}
