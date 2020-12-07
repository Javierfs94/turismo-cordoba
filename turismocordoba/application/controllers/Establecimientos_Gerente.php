<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EStablecimientos_Gerente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 3) {
            redirect("home");
        }
    }

    function borrar($post_id = null)
    {
        $this->Establecimiento->borrarEstablecimiento($post_id);

        redirect("gerente/establecimientos");
    }

    function cerrar($post_id = null)
    {
        $this->Establecimiento->cerrar_establecimiento($post_id);

        redirect("gerente/establecimientos");
    }

    function abrir($post_id = null)
    {
        $this->Establecimiento->abrir_establecimiento($post_id);

        redirect("gerente/establecimientos");
    }

    public function form($post_id = null)
    {
        $data["activeTab"] = "establecimientos";
        $data['mensaje'] = "";

        if ($post_id == null) {
            // crear post
            $data['nombre_establecimiento'] = $data['tipo'] = $data['direccion'] = $data['imagen'] =  "";
            $data['fecha_inicio'] = $data['fecha_fin'] = NULL;
            $data['estado'] = $data['puntos'] = 0;
            $data["title"] = "Crear establecimiento";
        } else {
            // edicion post
            $post = $this->Establecimiento->find($post_id);

            if (!isset($post)) {
                show_404();
            }

            $data['nombre_establecimiento'] =  $post->nombre_establecimiento;
            $data['direccion'] =  $post->direccion;
            $data['imagen'] = $post->imagen;
            $data['tipo'] = $post->tipo;
            $data['estado'] =  $post->estado;
            $data['borrado'] =  $post->borrado;
            $data["title"] = "Actualizar establecimiento";
        }

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('nombre_establecimiento', 'Nombre del establecimiento', 'required|min_length[5]|max_length[60]');
            $this->form_validation->set_rules('direccion', 'Dirección del establecimiento', 'required|min_length[6]|max_length[120]');

            $data['nombre_establecimiento'] =  $this->input->post("nombre_establecimiento");
            $data['direccion'] =  $this->input->post("direccion");
            $data['imagen'] =  $this->input->post("imagen");
            $data['tipo'] =  $this->input->post("tipo");
            $data['estado'] =  $this->input->post("estado");
            $data['borrado'] =  $this->input->post("borrado");

            if ($this->form_validation->run()) {
                // nuestro form es valido
                $save = array(
                    'id_empresa' =>  $this->Empresa->getIdEmpresaRow($_SESSION['id']),
                    'id_gerente' =>  $_SESSION['id'],
                    'nombre_establecimiento' =>  $this->input->post("nombre_establecimiento"),
                    'direccion' =>  $this->input->post("direccion"),
                    'imagen' =>  $this->input->post("imagen"),
                    'tipo' =>  $this->input->post("tipo"),
                    'estado' =>  $this->input->post("estado")
                );

                if ($post_id == null) {
                    $data['mensaje'] = "Establecimiento creado satisfactoriamente";
                    $this->Establecimiento->insert($save);
                    $str = $this->input->post("nombre_establecimiento");
                    $this->upload($post_id, str_replace(' ', '', $str));
                } else {
                    $data['mensaje'] = "Establecimiento modificado satisfactoriamente";
                    $this->Establecimiento->update($post_id, $save);

                    $str = $this->input->post("nombre_establecimiento");
                    $this->upload($post_id, str_replace(' ', '', $str));
                }
            }
        }

        $view["body"] = $this->load->view("gerente/establecimientos/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }

    function upload($post_id = null, $title = null)
    {

        $image = "avatar";

        // configuraciones de carga
        $config['upload_path'] = 'uploads/establecimientos';
        if ($title != null)
            $config['file_name'] = $title . $post_id;
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 5000;
        $config['overwrite'] = TRUE;

        //cargamos la libreria
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($image)) {
            // se cargo la imagen
            // datos del upload
            $data = $this->upload->data();

            if ($title != null && $post_id != null) {
                $save = array(
                    'imagen' => $title . $post_id . $data["file_ext"]
                );
                $this->Establecimiento->update($post_id, $save);
            }
            $this->resize_image($data['full_path']);
        } else if (!empty($_FILES[$image]['name'])) {
            //echo $this->upload->display_errors();
            $this->session->set_flashdata('text', $this->upload->display_errors());
            $this->session->set_flashdata('type', 'error');
        }
    }

    function resize_image($path_image)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_image;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 500;
        $config['height'] = 500;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }
}
