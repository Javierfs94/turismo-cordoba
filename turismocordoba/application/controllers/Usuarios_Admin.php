<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Usuarios_Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SESSION["perfil"] != 4) {
            redirect("home");
        }
    }

    public function banear($post_id = null)
    {
        $this->Usuario->banearUsuario($post_id);

        redirect("admin/usuarios");
    }

    public function borrar($post_id = null)
    {
        $this->Usuario->borrarUsuario($post_id);

        redirect("admin/usuarios");
    }

    public function editpass($post_id)
    {
        $data["activeTab"] = "usuarios";
        $data['mensaje'] = "";

        $post = $this->Usuario->find($post_id);

        if (!isset($post)) {
            show_404();
        }

        $data['password'] = $post->password;
        $data["title"] = "Actualizar Password Usuario";

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[60]');

            $data['password'] =  $this->input->post("password");

            if ($this->form_validation->run()) {
                $save = array(
                    'password' =>  md5($this->input->post("password"))
                );

                $data['mensaje'] = "Password de Usuario modificada satisfactoriamente";

                $save['last_modified'] = date('Y-m-d H:i:s');

                $this->Usuario->update($post_id, $save);

                $this->upload($post_id, $this->input->post("username"));
            }
        }
        $view["body"] = $this->load->view("admin/usuarios/editpass", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }

    public function form($post_id)
    {
        $data["activeTab"] = "usuarios";
        $data['mensaje'] = "";

        $post = $this->Usuario->find($post_id);

        if (!isset($post)) {
            show_404();
        }

        $data['username'] = $post->username;
        $data['nombre'] = $post->nombre;
        $data['apellidos'] = $post->apellidos;
        $data['email'] = $post->email;
        $data['imagen'] = $post->imagen;
        $data['perfil'] = $post->perfil;
        $data['baneado'] = $post->baneado;
        $data['borrado'] = $post->borrado;
        $data["title"] = "Actualizar Usuario";

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('username', 'Nombre de usuario', 'required|min_length[5]|max_length[30]');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('apellidos', 'Apelidos', 'required|min_length[5]|max_length[120]');
            $this->form_validation->set_rules('email', 'Correo', 'required|min_length[10]|max_length[60]');

            $data['username'] =  $this->input->post("username");
            $data['nombre'] =  $this->input->post("nombre");
            $data['apellidos'] =  $this->input->post("apellidos");
            $data['email'] =  $this->input->post("email");
            $data['perfil'] =  $this->input->post("perfil");
            $data['baneado'] =  $this->input->post("baneado");
            $data['borrado'] =  $this->input->post("borrado");
            $data['imagen'] =  $this->input->post("imagen");

            if ($this->form_validation->run()) {
                $save = array(
                    'username' =>  $this->input->post("username"),
                    'nombre' =>  $this->input->post("nombre"),
                    'apellidos' =>  $this->input->post("apellidos"),
                    'email' =>  $this->input->post("email"),
                    'perfil' =>  $this->input->post("perfil"),
                    'baneado' =>  $this->input->post("baneado"),
                    'borrado' =>  $this->input->post("borrado")
                );

                $data['mensaje'] = "Usuario modificado satisfactoriamente";

                $save['last_modified'] = date('Y-m-d H:i:s');

                $this->Usuario->update($post_id, $save);

                $this->upload($post_id, $this->input->post("username"));
            }
        }
        $view["body"] = $this->load->view("admin/usuarios/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }

    function upload($post_id = null, $title = null)
    {

        $image = "avatar";

        // configuraciones de carga
        $config['upload_path'] = 'uploads/perfiles';
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
                $this->Usuario->update($post_id, $save);
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
