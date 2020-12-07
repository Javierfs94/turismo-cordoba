<?php

class Usuario extends MY_Model
{
    public $table = "usuarios";
    public $table_id = "id";

    public function __construct()
    {
        parent::__construct();
    }

    public function borrarUsuario($post_id)
    {
        $data = array(
            'borrado' => 1
        );
        $this->db->where("id", $post_id);
        $this->db->update($this->table, $data);
    }

    public function banearUsuario($post_id)
    {
        $data = array(
            'baneado' => 1
        );
        $this->db->where("id", $post_id);
        $this->db->update($this->table, $data);
    }

    public function comprobarEmail($email)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where("email", $email);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    public function loginUser($data)
    {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where("email", $data['email']);
        $this->db->where("password", md5($data['password']));

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    function get_perfil($post_id)
    {
        $this->db->select();
        $this->db->from("perfil");
        $this->db->where('id_usuario', $post_id);
        $query = $this->db->get();
        return $query->result();
    }

    function getUsuarios()
    {
        $this->db->select();
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
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

    public function nuevoDependiente($dataDependiente)
    {
        $this->db->insert("usuarios", $dataDependiente);
    }

    public function nuevoPerfil($dataPerfil)
    {
        $this->db->insert("perfil", $dataPerfil);
    }

    public function getEmpleados($id_gerente)
    {
        $consulta = "SELECT usuarios.* FROM usuarios WHERE usuarios.id IN (SELECT id_dependiente FROM establecimientos_tiene_dependientes WHERE id_establecimiento IN (SELECT id FROM establecimientos WHERE id_gerente = $id_gerente)) ";
        $query = $this->db->query($consulta);
        return $query->result();
    }

    function sacar_puntos($codigo)
    {
        $this->db->select("puntos");
        $this->db->from("ofertas");
        $this->db->where('codigo', $codigo);
        $this->db->where('estado', 1);
        $puntos = $this->db->get();
        foreach ($puntos->result_array() as $row) {
            return $row["puntos"];
        }
    }

    function obtenerIDEmpresaDependiene($id_dependiente)
    {
        $query = $this->db->query("SELECT * FROM ofertas WHERE id_empresa IN (SELECT id_empresa FROM establecimientos WHERE id =(SELECT id_establecimiento FROM establecimientos_tiene_dependientes WHERE id_dependiente = $id_dependiente))");

        foreach ($query->result() as $row) {
            return $row->id_empresa;
        }
    }

    function getNivelUsuario($id_usuario)
    {
        $this->db->select("nivel");
        $this->db->from("perfil");
        $this->db->join('usuarios', 'usuarios.id = perfil.id_usuario');
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            return $row->nivel;
        }
    }

    function sacar_perfil($email)
    {
        $this->db->select("id_usuario, puntos, nivel");
        $this->db->from("usuarios");
        $this->db->join('perfil', 'usuarios.id = perfil.id_usuario');
        $this->db->where('email', $email);
        $this->db->where('perfil', 1);
        $perfil = $this->db->get();
        foreach ($perfil->result_array() as $row) {
            return $row;
        }
    }

    function sumar_puntos($email, $codigo)
    {

        $puntos_nuevos = $this->sacar_puntos($codigo);
        $perfil = $this->sacar_perfil($email);
        $puntos_totales = $puntos_nuevos + $perfil["puntos"];
        if ($puntos_totales >= 100) {
            $data = array(
                'puntos' => $puntos_totales - 100,
                'nivel' => $perfil["nivel"] + 1,
            );
        } else {
            $data = array(
                'puntos' => $puntos_totales,
                'nivel' => $perfil["nivel"],
            );
        }
        $this->db->where('id_usuario', $perfil["id_usuario"]);
        $this->db->update("perfil", $data);
    }
}
