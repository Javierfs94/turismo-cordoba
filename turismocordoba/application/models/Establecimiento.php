<?php

class Establecimiento extends MY_Model
{
    public $table = "establecimientos";
    public $table_id = "id";

    function getEstablecimientos()
    {
        $this->db->select();
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function borrarEstablecimiento($post_id)
    {
        $data = array(
            'borrado' => 1
        );
        $this->db->where("id", $post_id);
        $this->db->update($this->table, $data);
    }



    function getEstablecimientoDependiente($id_dependiente)
    {
        $this->db->select("id_establecimiento");
        $this->db->from('establecimientos_tiene_dependientes');
        $this->db->where('id_dependiente', $id_dependiente);
        $this->db->join('empresas', 'empresas.id=establecimientos_tiene_dependientes.id_establecimiento');
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->id_establecimiento;
        }
    }

    function mostrar_establecimientos()
    {
        $this->db->select("establecimientos.*, empresas.nombre_empresa");
        $this->db->from($this->table);
        $this->db->where('establecimientos.borrado', 0);
        $this->db->where('establecimientos.estado', 1);
        $this->db->join('empresas', 'empresas.id=establecimientos.id_empresa');
        $query = $this->db->get();

        return $query->result();
    }

    function mostrar_establecimientos_filtrados($tipo)
    {
        $this->db->select("establecimientos.*, empresas.nombre_empresa");
        $this->db->from($this->table);
        $this->db->where('estado', 1);
        $this->db->where('establecimientos.borrado', 0);
        $this->db->where('establecimientos.estado', 1);
        $this->db->where('tipo', $tipo);
        $this->db->join('empresas', 'empresas.id=establecimientos.id_empresa');
        $query = $this->db->get();

        return $query->result();
    }

    function mostrar_establecimientos_propios($id_empresa, $id_gerente)
    {
        $consulta = "SELECT establecimientos.id, empresas.nombre_empresa, establecimientos.* 
        FROM establecimientos, empresas, usuarios WHERE establecimientos.id_empresa=empresas.id AND empresas.id=$id_empresa AND usuarios.id=$id_gerente AND establecimientos.borrado=0";
        $query = $this->db->query($consulta);

        return $query->result();
    }

    function mostrar_establecimientos_empresa($id_gerente)
    {
        $consulta = "SELECT establecimientos.id, establecimientos.nombre_establecimiento FROM establecimientos WHERE id_empresa = (SELECT id FROM empresas WHERE empresas.id_gerente=$id_gerente)";
        $query = $this->db->query($consulta);

        return $query->result();
    }
   
    function abrir_establecimiento($id)
    {     
        $data = array(
            'estado' => 1
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    
    function cerrar_establecimiento($id)
    {     
        $data = array(
            'estado' => 0
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
   
}
