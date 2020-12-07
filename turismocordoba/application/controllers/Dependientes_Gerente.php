<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dependientes_Gerente extends CI_Controller
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
        $this->Usuario->borrarUsuario($post_id);

        redirect("gerente/dependientes");
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

                $data['mensaje'] = "Password de Dependiente modificada satisfactoriamente";

                $save['last_modified'] = date('Y-m-d H:i:s');

                $this->Usuario->update($post_id, $save);

                $this->upload($post_id, $this->input->post("username"));
            }
        }
        $view["body"] = $this->load->view("admin/usuarios/editpass", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }

    public function form($post_id = null)
    {
        $data["activeTab"] = "dependientes";
        $data['mensaje'] = "";
        $data['establecimientos'] =  $this->Establecimiento->mostrar_establecimientos_empresa($_SESSION['id']);

        if ($post_id == null) {
            $data['username'] = $data['nombre'] = $data['apellidos'] = $data['email'] = $data['imagen'] = "";
            $data['establecimientos_empresa'] = $data['borrado'] = 0;
            $data["title"] = "Crear dependiente";
        } else {
            $post = $this->Usuario->find($post_id);

            if (!isset($post)) {
                show_404();
            }

            $data['establecimientos_empresa'] =  $this->Establecimiento->getEstablecimientoDependiente($post_id);
            $data['username'] = $post->username;
            $data['nombre'] = $post->nombre;
            $data['apellidos'] = $post->apellidos;
            $data['email'] = $post->email;
            $data['imagen'] = $post->imagen;
            $data['borrado'] = $post->borrado;
            $data["title"] = "Actualizar dependiente";
        }

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('username', 'Nombre de usuario', 'required|min_length[5]|max_length[30]');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[3]|max_length[100]');
            $this->form_validation->set_rules('apellidos', 'Apelidos', 'required|min_length[5]|max_length[120]');
            $this->form_validation->set_rules('email', 'Correo', 'required|min_length[10]|max_length[60]');

            $data['username'] =  $this->input->post("username");
            $data['nombre'] =  $this->input->post("nombre");
            $data['apellidos'] =  $this->input->post("apellidos");
            $data['email'] =  $this->input->post("email");
            $data['borrado'] =  $this->input->post("borrado");
            $data['imagen'] =  $this->input->post("imagen");
            $data['establecimientos_empresa'] =  $this->input->post("establecimientos_empresa");

            if ($this->form_validation->run()) {
                
                $dataDependiente = array(
                    'username' =>  $this->input->post("username"),
                    'password' =>  md5($this->input->post("username")),
                    'nombre' =>  $this->input->post("nombre"),
                    'apellidos' =>  $this->input->post("apellidos"),
                    'email' =>  $this->input->post("email"),
                    'perfil' =>  2,
                    'borrado' =>  $this->input->post("borrado"),
                    'created_at' => date('Y-m-d H:i:s')
                );

                $dataEstablecimiento_Dependientes = array(
                    'id_establecimiento' => $this->input->post("establecimientos_empresa"),
                    'id_dependiente' => $post_id
                );

                if ($post_id == null) {
                    if ($this->Usuario->comprobarEmail($this->input->post('email'))) {
                        $data["mensaje"] = "El correo del dependiente ya existe";
                        $view["body"] = $this->load->view('gerente/dependientes/form', $data, TRUE);
                        $this->parser->parse('template/body', $view);
                    } else {
                        $data['mensaje'] = "Dependiente creado satisfactoriamente. Su password es su nombre de usuario.";
                        $this->Usuario->nuevoDependiente($dataDependiente);

                        $id_dependiente = $this->Usuario->getIdByEmail($this->input->post('email'));
                        
                        $dataEstablecimiento_Dependientes['id_dependiente'] = $id_dependiente->id;

                        $this->Establecimientos_tiene_dependientes->nuevoDependiente($dataEstablecimiento_Dependientes);
                    }
                } else {
                    $data['mensaje'] = "Dependiente modificado satisfactoriamente";

                    $dataDependiente['last_modified'] = date('Y-m-d H:i:s');

                    $this->Usuario->update($post_id, $dataDependiente);
                    $this->Establecimientos_tiene_dependientes->update($this->Establecimientos_tiene_dependientes->getEstablecimientoID($post_id), $dataEstablecimiento_Dependientes);

                    $this->upload($post_id, $this->input->post("username"));
                }
            }
        }

        $view["body"] = $this->load->view("gerente/dependientes/form", $data, TRUE);
        $this->parser->parse("template/body", $view);
    }


    function upload($post_id = null, $title = null)
    {

        $image = "avatar";

        // configuraciones de carga
        $config['upload_path'] = 'uploads/perfiles';
        if ($title != null)
            $config['file_name'] = $title . $post_id;
        $config['allowed_types'] = 'gif|jpg|png';
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
