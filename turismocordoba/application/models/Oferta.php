<?php

class Oferta extends MY_Model
{

    public $table = "ofertas";
    public $table_id = "id";

    function getOfertas()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    function comprobarFechasOfertas()
    {
        $consulta = "UPDATE ofertas SET estado=0 WHERE id IN(SELECT id FROM `ofertas` WHERE fecha_fin<CURRENT_TIMESTAMP)";
        $this->db->query($consulta);
    }

    function comprobarCodigo($codigo)
    {
        $this->db->select("codigo");
        $this->db->from($this->table);
        $this->db->where('codigo', $codigo);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function borrarOferta($post_id)
    {
        $data = array(
            'borrado' => 1
        );
        $this->db->where("id", $post_id);
        $this->db->update($this->table, $data);
    }

    function mostrar_ofertas($nivel_usuario)
    {
        $this->db->select("ofertas.*, empresas.nombre_empresa");
        $this->db->from($this->table);
        $this->db->where('ofertas.estado', 1);
        $this->db->where('ofertas.borrado', 0);
        $this->db->where('ofertas.nivel_requerido <=', $nivel_usuario);
        $this->db->join('empresas', 'empresas.id=ofertas.id_empresa');
        $this->db->order_by('tipo', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function mostrar_ofertas_filtradas($nivel_usuario, $tipo)
    {
        $this->db->select("ofertas.*, empresas.nombre_empresa");
        $this->db->from($this->table);
        $this->db->where('ofertas.estado', 1);
        $this->db->where('ofertas.borrado', 0);
        $this->db->where('ofertas.nivel_requerido <=', $nivel_usuario);
        $this->db->where('tipo', $tipo);
        $this->db->join('empresas', 'empresas.id=ofertas.id_empresa');
        $this->db->order_By('puntos', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function mostrar_ofertas_propiasDependiente($id_empresa)
    {
        $query = $this->db->query("SELECT ofertas.* FROM ofertas, empresas WHERE ofertas.id_empresa=empresas.id AND empresas.id=$id_empresa AND ofertas.estado=1 AND ofertas.borrado=0 ORDER BY tipo DESC ");

        return $query->result();
    }

    function mostrar_ofertas_propias($id_empresa, $id_gerente)
    {
        $query = $this->db->query("SELECT ofertas.*, empresas.nombre_empresa
        FROM ofertas, empresas, usuarios WHERE ofertas.id_empresa=empresas.id AND empresas.id=$id_empresa AND usuarios.id=$id_gerente AND ofertas.borrado=0 ORDER BY tipo DESC");

        return $query->result();
    }

    function desactivar_oferta($post_id)
    {
        $data = array(
            'estado' => 0
        );
        $this->db->where('id', $post_id);
        $this->db->update($this->table, $data);
    }

    function activar_oferta($post_id)
    {
        $data = array(
            'estado' => 1
        );
        $this->db->where('id', $post_id);
        $this->db->update($this->table, $data);
    }
}
