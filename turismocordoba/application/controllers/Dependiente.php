<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dependiente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 2) {
            redirect("home");
        }
        $this->Oferta->comprobarFechasOfertas();
    }

    public function canjear()
    {
        foreach ($_POST as $key => $value) {
            if ($key !== "email") {
                $this->Usuario->sumar_puntos($_POST['email'], $value);
            }
        }
        redirect("home");
    }

    public function codigos()
    {
        $id_empresa =  $this->Usuario->obtenerIDEmpresaDependiene($_SESSION['id']);
        $data['ofertas'] =  $this->Oferta->mostrar_ofertas_propiasDependiente($id_empresa);
        $data["cantidad"] = $this->input->post("cantidad");
        $data["activeTab"] = "home";
        $view["body"] = $this->load->view('home/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }
}
