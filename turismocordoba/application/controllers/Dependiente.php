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
        $data["activeTab"] = "canjear";
        $data['mensaje'] = "";

        $data['codigo'] = $this->input->post('codigo');

        $id_empresa =  $this->Usuario->obtenerIDEmpresaDependiene($_SESSION['id']);
        $data['ofertas'] =  $this->Oferta->mostrar_ofertas_propiasDependiente($id_empresa);

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('email', 'Correo', 'required|min_length[10]|max_length[60]');

            if ($this->form_validation->run()) {
                if ($this->Usuario->comprobarEmail($this->input->post('email'))) {
                    $data['mensaje'] = "El correo es válido. Puntos canjeados correctamente";
                    foreach ($_POST as $key => $value) {
                        if ($key !== "email") {
                            $this->Usuario->sumar_puntos($_POST['email'], $value);
                        }
                    }
                } else {
                    $data['mensaje'] = "El correo no existe";
                }
            }
        }
        $view["body"] = $this->load->view('dependiente/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }
}
