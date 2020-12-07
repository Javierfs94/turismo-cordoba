<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perfiles extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect("home");
    }

    public function perfil($id)
    {
        $data["activeTab"] = "perfil";
        $view["title"] = "Perfil";
        $data["datos"] = $this->Usuario->find($id);
        $data["perfil"] = $this->Usuario->get_perfil($id);
        $view["body"] = $this->load->view('perfiles/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }

    public function form($post_id = null)
    {
        $data["activeTab"] = "";
        $data['mensaje'] = "";

        if ($post_id == null) {
            // crear post
            $data['username'] = $data['password'] = $data['nombre'] = $data['apellidos'] = $data['email'] = $data['imagen'] = "";
            $data['perfil'] = $data['borrado'] = 0;
            $data["title"] = "Crear Usuario";
        } else {
            // edicion post
            $post = $this->Usuario->find($post_id);

            if (!isset($post)) {
                show_404();
            }

            $data['username'] = $post->username;
            $data['password'] = $post->password;
            $data['nombre'] = $post->nombre;
            $data['apellidos'] = $post->apellidos;
            $data['imagen'] = $post->imagen;
            $data["title"] = "Editar perfil";
        }

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('apellidos', 'Apelidos', 'required|min_length[5]|max_length[120]');

            $data['nombre'] =  $this->input->post("nombre");
            $data['apellidos'] =  $this->input->post("apellidos");
            $data['imagen'] =  $this->input->post("imagen");

            if ($this->form_validation->run()) {
                // nuestro form es valido
                $save = array(
                    'nombre' =>  $this->input->post("nombre"),
                    'apellidos' =>  $this->input->post("apellidos"),
                );


                $data['mensaje'] = "Perfil modificado correctamente";

                $save['last_modified'] = date('Y-m-d H:i:s');

                $this->Usuario->update($post_id, $save);

                $this->upload($post_id, $this->input->post("username"));
            }
        }
        $view["body"] = $this->load->view("perfiles/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }


    function actpass($post_id)
    {

        $data["activeTab"] = "";
        $data['mensaje'] = "";

        $post = $this->Usuario->find($post_id);

        $data['newpass1'] = $data['newpass2'] =  '';

        if (!isset($post)) {
            show_404();
        }

        $data["title"] = "Editar contraseña";

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('newpass1', 'Nueva password', 'required|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('newpass2', 'Repetir password', 'required|min_length[5]|max_length[120]');

            $data['newpass1'] =  $this->input->post("newpass1");
            $data['newpass2'] =  $this->input->post("newpass2");

            if ($this->form_validation->run()) {

                if ($this->input->post("newpass1") != $this->input->post("newpass2")) {

                    $data['mensaje'] = "La contraseña no es la misma";

                } else {

                    $save = array(
                        'password' =>  md5($this->input->post("newpass1")),
                        'last_modified' => date('Y-m-d H:i:s')
                    );

                    $data['mensaje'] = "Password modificada correctamente";

                    $this->Usuario->update($post_id, $save);
                }
            }
        }
        $view["body"] = $this->load->view("perfiles/editpass", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }

    function upload($post_id = null, $title = null)
    {

        $image = "avatar";

        $config['upload_path'] = 'uploads/perfiles';
        if ($title != null) {
            $config['file_name'] = $title . $post_id;
        }
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($image)) {
            $data = $this->upload->data();

            if ($title != null && $post_id != null) {
                $save = array(
                    'imagen' => $title . $post_id . $data["file_ext"]
                );
                $this->Usuario->update($post_id, $save);
                $_SESSION['imagen'] =  $title . $post_id . $data["file_ext"];
            }
            $this->resize_image($data['full_path']);
        } else if (!empty($_FILES[$image]['name'])) {
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
