<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 4) {
            redirect("home");
        }
        $this->Oferta->comprobarFechasOfertas();
    }

    public function usuarios()
    {
        $data["activeTab"] = "usuarios";
        $data["usuarios"] = $this->Usuario->getUsuarios();
        $view["body"] = $this->load->view('admin/usuarios/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }

    public function ofertas()
    {
        $data["activeTab"] = "ofertas";
        $data["ofertas"] = $this->Oferta->getOfertas();
        $view["body"] = $this->load->view('admin/ofertas/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }

    public function establecimientos()
    {
        $data["activeTab"] = "establecimientos";
        $data["establecimientos"] = $this->Establecimiento->getEstablecimientos();
        $view["body"] = $this->load->view('admin/establecimientos/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }

    public function empresas()
    {
        $data["activeTab"] = "empresas";
        $data["empresas"] = $this->Empresa->getEmpresas();
        $view["body"] = $this->load->view('admin/empresas/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }

    public function solicitudes($post_id = null)
    {
        if ($post_id == null) {
            $data["solicitudes"] = $this->Solicitud->solicitudesPendientes();
            $data["activeTab"] = "solicitudes";
            $view["body"] = $this->load->view('admin/solicitudes/index', $data, TRUE);
            $this->parser->parse('template/body', $view);
        } else {
            $this->Solicitud->validarSolicitud($post_id);
            $data["solicitudes"] = $this->Solicitud->solicitudesPendientes();
            $data["activeTab"] = "solicitudes";
            $view["body"] = $this->load->view('admin/solicitudes/index', $data, TRUE);
            $this->parser->parse('template/body', $view);
        }
    }
}
