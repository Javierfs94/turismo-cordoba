<?php

class Establecimientos_tiene_dependientes extends MY_Model
{
    public $table = "establecimientos_tiene_dependientes";
    public $table_id = "id";

    public function nuevoDependiente($dataEstablecimiento_Dependientes)
    {
        $this->db->insert("establecimientos_tiene_dependientes", $dataEstablecimiento_Dependientes);
    }


    function getEstablecimientoID($id_dependiente)
    {
        $this->db->select("id");
        $this->db->from($this->table);
        $this->db->where('id_dependiente', $id_dependiente);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->id;
        }
    }


}
