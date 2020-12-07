<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Turista extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 1) {
            redirect("home");
        }
        $this->Oferta->comprobarFechasOfertas();
    }

    public function ofertas($filtro = null)
    {
        $data["activeTab"] = "ofertas";
        $data['nivel_usuario'] = $this->Usuario->getNivelUsuario($_SESSION['id']);

        if ($filtro == null) {
            $data['ofertas'] = $this->Oferta->mostrar_ofertas($data['nivel_usuario']);
            $view["body"] = $this->load->view('turista/ofertas/index', $data, TRUE);
            $this->parser->parse('template/body', $view);
        } else {
            $data['ofertas'] = $this->Oferta->mostrar_ofertas_filtradas($data['nivel_usuario'], $filtro);
            $view["body"] = $this->load->view('turista/ofertas/index', $data, TRUE);
            $this->parser->parse('template/body', $view);
        }
    }

    public function establecimientos($filtro = null)
    {
        $data["activeTab"] = "establecimientos";
        if ($filtro == null) {
            $data['establecimientos'] = $this->Establecimiento->mostrar_establecimientos();
            $view["body"] = $this->load->view('turista/establecimientos/index', $data, TRUE);
            $this->parser->parse('template/body', $view);
        } else {
            $data['establecimientos'] = $this->Establecimiento->mostrar_establecimientos_filtrados($filtro);
            $view["body"] = $this->load->view('turista/establecimientos/index', $data, TRUE);
            $this->parser->parse('template/body', $view);
        }
    }
}
