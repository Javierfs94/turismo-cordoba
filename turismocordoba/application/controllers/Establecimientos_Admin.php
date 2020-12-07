<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Establecimientos_Admin extends CI_Controller
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
        $this->Establecimiento->borrarEstablecimiento($post_id);

        redirect("admin/establecimientos");
    }

    public function form($post_id)
    {
        $data["activeTab"] = "establecimientos";
        $data['mensaje'] = "";

        $post = $this->Establecimiento->find($post_id);

        if (!isset($post)) {
            show_404();
        }

        $data['nombre_establecimiento'] =  $post->nombre_establecimiento;
        $data['direccion'] = $post->direccion;
        $data['tipo'] =  $post->tipo;
        $data['imagen'] = $post->imagen;
        $data['estado'] =  $post->estado;
        $data['borrado'] =  $post->borrado;
        $data["title"] = "Actualizar establecimiento";

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('nombre_establecimiento', 'Nombre del establecimiento', 'required|min_length[5]|max_length[120]');
            $this->form_validation->set_rules('direccion', 'Dirección del establecimiento', 'required|min_length[10]|max_length[120]');

            $data['nombre_establecimiento'] =  $this->input->post("nombre_establecimiento");
            $data['direccion'] =  $this->input->post("direccion");
            $data['imagen'] =  $this->input->post("imagen");
            $data['tipo'] =  $this->input->post("tipo");
            $data['estado'] =  $this->input->post("estado");
            $data['borrado'] =  $this->input->post("borrado");

            if ($this->form_validation->run()) {
                // nuestro form es valido
                $save = array(
                    'nombre_establecimiento' =>  $this->input->post("nombre_establecimiento"),
                    'direccion' =>  $this->input->post("direccion"),
                    'imagen' =>  $this->input->post("imagen"),
                    'tipo' =>  $this->input->post("tipo"),
                    'estado' =>  $this->input->post("estado"),
                    'borrado' =>  $this->input->post("borrado")
                );

                $data['mensaje'] = "Establecimiento modificado satisfactoriamente";
                $this->Establecimiento->update($post_id, $save);

                $str = $this->input->post("nombre_establecimiento");
                $this->upload($post_id, str_replace(' ', '', $str));
            }
        }

        $view["body"] = $this->load->view("admin/establecimientos/form", $data, TRUE);
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
