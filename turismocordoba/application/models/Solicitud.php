<?php

class Solicitud extends MY_Model
{
    public $table = "perfil";
    public $table_id = "id";

    public function nuevaSolicitud($dataEmpresa, $dataEstablecimiento, $dataGerente)
    {
        $this->db->insert("usuarios", $dataGerente);
        $this->db->insert("empresas", $dataEmpresa);
        $this->db->insert("establecimientos", $dataEstablecimiento);
    }

    public function solicitudesPendientes()
    {
        $this->db->select("*");
        $this->db->from("empresas");
        $this->db->where("aprobada", "no");

        $query = $this->db->get();
        return $query->result();
    }

    public function validarSolicitud($post_id = null)
    {
        $data = array(
            'aprobada' => "si"
        );

        $this->db->where('id', $post_id);
        $this->db->update('empresas', $data);
    }

    public function comprobarEmail($email)
    {
        $this->db->select("*");
        $this->db->from("usuarios");
        $this->db->where("email", $email);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function getIdByEmail($email)
    {
        $this->db->select("id");
        $this->db->from("usuarios");
        $this->db->where("email", $email);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    public function actualizarDatos($id_gerente, $nombre_empresa, $nombre_establecimiento)
    {

        $consultaEmpresa = "SELECT id FROM empresas WHERE nombre_empresa='$nombre_empresa'";

        $queryEmpresa = $this->db->query($consultaEmpresa);

        $rowEmpresa = $queryEmpresa->row_array();

        if (isset($rowEmpresa)) {
            $this->db->set('id_gerente', $id_gerente);
            $this->db->where('id', $rowEmpresa['id']);
            $this->db->update('empresas');
        }

        $consultaEstablecimiento = "SELECT id FROM establecimientos WHERE nombre_establecimiento='$nombre_establecimiento'";

        $queryEstablecimiento = $this->db->query($consultaEstablecimiento);

        $rowEstablecimiento = $queryEstablecimiento->row_array();

        if (isset($rowEstablecimiento)) {
            $this->db->set('id_gerente', $id_gerente);
            $this->db->set('id_empresa', $rowEmpresa['id']);
            $this->db->where('id', $rowEstablecimiento['id']);
            $this->db->update('establecimientos');
        }
    }
}
