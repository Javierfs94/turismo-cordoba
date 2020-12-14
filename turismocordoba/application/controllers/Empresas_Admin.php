<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Empresas_Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 4) {
            redirect("home");
        }
    }

    public function borrar($post_id = null)
    {
        $this->Empresa->borrarEmpresa($post_id);

        redirect("admin/empresas");
    }

    public function form($post_id = null)
    {
        $data["activeTab"] = "empresas";
        $data['mensaje'] = "";

        if ($post_id == null) {
            // crear post
            $data['nombre_empresa'] =  "";
            $data['borrado'] = 0;
            $data["title"] = "Crear Empresa";
        } else {
            // edicion post
            $post = $this->Empresa->find($post_id);

            if (!isset($post)) {
                show_404();
            }

            $data['nombre_empresa'] = $post->nombre_empresa;
            $data['borrado'] = $post->borrado;
            $data["title"] = "Actualizar Empresa";
        }

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('nombre_empresa', 'Nombre de empresa', 'required|min_length[2]|max_length[60]');

            $data['nombre_empresa'] =  $this->input->post("nombre_empresa");
            
            if ($this->form_validation->run()) {
                // nuestro form es valido
                $save = array(
                    'nombre_empresa' =>  $this->input->post("nombre_empresa"),
                    'borrado' =>  $this->input->post("borrado")
                );

                if ($post_id == null) {
                    $data['mensaje'] = "Empresa creada satisfactoriamente";
                    $data = array(
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $this->Empresa->insert($save);
                } else {
                    $data['mensaje'] = "Empresa modificada satisfactoriamente";

                    // $save['last_modified'] = date('Y-m-d H:i:s');

                    $this->Empresa->update($post_id, $save);
                }
            }
        }

        $view["body"] = $this->load->view("admin/empresas/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }
}
