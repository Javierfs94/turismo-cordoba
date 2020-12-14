<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ofertas_Gerente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 3) {
            redirect("home");
        }
    }

    public function borrar($post_id = null)
    {
        $this->Oferta->borrarOferta($post_id);

        redirect("gerente/ofertas");
    }

    function desactivar($post_id = null)
    {
        $this->Oferta->desactivar_oferta($post_id);

        redirect("gerente/ofertas");
    }

    function activar($post_id = null)
    {
        $this->Oferta->activar_oferta($post_id);

        redirect("gerente/ofertas");
    }

    public function form($post_id = null)
    {
        $data["activeTab"] = "ofertas";
        $data['mensaje'] = "";

        if ($post_id == null) {
            // crear post
            $data['descripcion'] = $data['tipo'] =  "";
            $data['fecha_inicio'] = $data['fecha_fin'] = NULL;
            $data['estado'] = $data['nivel_requerido'] =  1;
            $data['puntos'] = 5;
            $data["title"] = "Crear oferta";
        } else {
            // edicion post
            $post = $this->Oferta->find($post_id);

            if (!isset($post)) {
                show_404();
            }

            $data['descripcion'] =  $post->descripcion;
            $data['tipo'] = $post->tipo;
            $data['nivel_requerido'] =  $post->nivel_requerido;
            $data['puntos'] =  $post->puntos;
            $data['fecha_inicio'] =  $post->fecha_inicio;
            $data['fecha_fin'] =  $post->fecha_fin;
            $data['estado'] =  $post->estado;
            $data["title"] = "Actualizar oferta";
        }

        $id_empresa = $this->Empresa->getIdEmpresa($_SESSION["id"]);

        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $this->form_validation->set_rules('descripcion', 'Descripcion de la oferta', 'required|min_length[5]|max_length[120]');
            $this->form_validation->set_rules('nivel_requerido', 'Nivel requerido', 'required|min_length[1]|max_length[3]');
            $this->form_validation->set_rules('puntos', 'Puntos otorgados por la oferta', 'required|min_length[1]|max_length[2]');

            $data['descripcion'] =  $this->input->post("descripcion");
            $data['tipo'] =  $this->input->post("tipo");
            $data['puntos'] =  $this->input->post("puntos");
            $data['fecha_inicio'] =  $this->input->post("fecha_inicio");
            $data['fecha_fin'] =  $this->input->post("fecha_fin");
            $data['estado'] =  $this->input->post("estado");
            $data['nivel_requerido'] =  $this->input->post("nivel_requerido");

            if ($this->form_validation->run()) {
                $save = array(
                    'id_empresa' =>  $id_empresa[0]->id,
                    'descripcion' =>  $this->input->post("descripcion"),
                    'tipo' =>  $this->input->post("tipo"),
                    'codigo' => rand(0, 1000),
                    'nivel_requerido' =>  $this->input->post("nivel_requerido"),
                    'puntos' =>  $this->input->post("puntos"),
                    'fecha_inicio' =>  $this->input->post("fecha_inicio"),
                    'fecha_fin' =>  $this->input->post("fecha_fin"),
                    'estado' =>  $this->input->post("estado")
                );

                if ($post_id == null) {
                    $data['mensaje'] = "Oferta creada satisfactoriamente";
                    $this->Oferta->insert($save);
                } else {
                    $data['mensaje'] = "Oferta modificada satisfactoriamente";
                    $this->Oferta->update($post_id, $save);
                }
            }
        }

        $view["body"] = $this->load->view("gerente/ofertas/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }
}
