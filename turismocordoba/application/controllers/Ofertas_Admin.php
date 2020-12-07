<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ofertas_Admin extends CI_Controller
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
        $this->Oferta->borrarOferta($post_id);

        redirect("admin/ofertas");
    }

    public function form($post_id = null)
    {
        $data["activeTab"] = "ofertas";
        $data['mensaje'] = "";

        if ($post_id == null) {
            // crear post
            $data['descripcion'] = $data['tipo'] = $data['codigo'] =  "";
            $data['fecha_inicio'] = $data['fecha_fin'] = NULL;
            $data['estado'] = $data['borrado'] = $data['puntos'] = 0;
            $data["title"] = "Crear oferta";
        } else {
            // edicion post
            $post = $this->Oferta->find($post_id);

            if (!isset($post)) {
                show_404();
            }

            $data['descripcion'] =  $post->descripcion;
            $data['tipo'] = $post->tipo;
            $data['codigo'] =  $post->codigo;
            $data['puntos'] =  $post->puntos;
            $data['fecha_inicio'] =  $post->fecha_inicio;
            $data['fecha_fin'] =  $post->fecha_fin;
            $data['estado'] =  $post->estado;
            $data['borrado'] =  $post->borrado;
            $data["title"] = "Actualizar oferta";
        }

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('descripcion', 'Descripcion de la oferta', 'required|min_length[5]|max_length[60]');
            $this->form_validation->set_rules('puntos', 'Puntos otorgados por la oferta', 'required|min_length[1]|max_length[2]');

            $data['descripcion'] =  $this->input->post("descripcion");
            $data['tipo'] =  $this->input->post("tipo");
            $data['puntos'] =  $this->input->post("puntos");
            $data['fecha_inicio'] =  $this->input->post("fecha_inicio");
            $data['fecha_fin'] =  $this->input->post("fecha_fin");
            $data['estado'] =  $this->input->post("estado");
            $data['borrado'] =  $this->input->post("borrado");

            if ($this->form_validation->run()) {
                // nuestro form es valido
                $save = array(
                    'descripcion' =>  $this->input->post("descripcion"),
                    'tipo' =>  $this->input->post("tipo"),
                    'codigo' => rand(0, 1000),
                    'puntos' =>  $this->input->post("puntos"),
                    'fecha_inicio' =>  $this->input->post("fecha_inicio"),
                    'fecha_fin' =>  $this->input->post("fecha_fin"),
                    'estado' =>  $this->input->post("estado"),
                    'borrado' =>  $this->input->post("borrado")
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

        $view["body"] = $this->load->view("admin/ofertas/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }
}
