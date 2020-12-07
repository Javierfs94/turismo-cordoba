<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gerente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 3) {
            redirect("home");
        }
        $this->Oferta->comprobarFechasOfertas();
    }

    public function ofertas()
    {
        $_SESSION['id_empresa'] = $this->Empresa->getIdEmpresa($_SESSION["id"]);
        $data['ofertas'] = $this->Oferta->mostrar_ofertas_propias($_SESSION["id_empresa"][0]->id, $_SESSION["id"]);
        $data["activeTab"] = "ofertas";
        $view["body"] = $this->load->view('gerente/ofertas/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }

    public function establecimientos()
    {
        $_SESSION['id_empresa'] = $this->Empresa->getIdEmpresa($_SESSION["id"]);
        $data['establecimientos'] = $this->Establecimiento->mostrar_establecimientos_propios($_SESSION["id_empresa"][0]->id, $_SESSION["id"]);
        $data["activeTab"] = "establecimientos";
        $view["body"] = $this->load->view('gerente/establecimientos/index', $data, TRUE);
        $this->parser->parse('template/body', $view);   
    }
    
    public function dependientes()
    {
        $data['dependientes'] = $this->Usuario->getEmpleados($_SESSION["id"]);
        $data["activeTab"] = "dependientes";
        $view["body"] = $this->load->view('gerente/dependientes/index', $data, TRUE);
        $this->parser->parse('template/body', $view);   
    }

}
