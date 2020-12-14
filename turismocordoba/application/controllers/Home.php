<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data["activeTab"] = "home";
        $view["title"] = "Home";
        if (isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == 3)) {
            $data['validacion_empresa'] = $this->Empresa->comprobarAprobada($_SESSION["id"]);
        }
        $view["body"] = $this->load->view('home/index', $data, TRUE);
        $this->parser->parse('template/body', $view);
    }

    public function login()
    {
        $data["mensaje"] = "";
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if ($_POST["email"] && $_POST["password"]) {

                $login = $this->Usuario->loginUser($_POST);

                if ($login) {
                    $data = array(
                        'id' => $login[0]->id,
                        'username' => $login[0]->username,
                        'password' => $login[0]->password,
                        'nombre' => $login[0]->nombre,
                        'apellidos' => $login[0]->apellidos,
                        'imagen' => $login[0]->imagen,
                        'email' => $login[0]->email,
                        'perfil' => $login[0]->perfil,
                        'baneado' => $login[0]->baneado,
                        'borrado' => $login[0]->borrado
                    );

                    $this->session->set_userdata($data);

                    $data = array(
                        'last_login' => date('Y-m-d H:i:s')
                    );

                    $this->Usuario->update($login[0]->id, $data);

                    redirect("home");
                } else {
                    $data["activeTab"] = "login";
                    $view["title"] = "Login";
                    $data["mensaje"] = "La cuenta no es correcta";
                    $view["body"] = $this->load->view('app/login', $data, TRUE);
                    $this->parser->parse('template/body', $view);
                }
            }
        } else {
            $data["activeTab"] = "login";
            $view["title"] = "Login";
            $view["body"] = $this->load->view('app/login', $data, TRUE);
            $this->parser->parse('template/body', $view);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("home");
    }

    public function registro()
    {
        $data["mensaje"] = "";
        $data["activeTab"] = "registro";
        $view["title"] = "Registro";

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $view["body"] = $this->load->view('app/registro', $data, TRUE);
            $this->parser->parse('template/body', $view);
        } else {
            if ($this->Usuario->comprobarEmail($this->input->post('email'))) {
                $data["mensaje"] = "El correo ya existe";
                $view["body"] = $this->load->view('app/registro', $data, TRUE);
                $this->parser->parse('template/body', $view);
            } else {
                $save = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellidos' => $this->input->post('apellidos'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'perfil' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                );

                $dataPerfil = array(
                    'puntos' => 0,
                    'nivel' => 1
                );

                $this->Usuario->insert($save);

                $id_usuario = $this->Usuario->getIdByEmail($this->input->post('email'));
                $dataPerfil['id_usuario'] = $id_usuario->id;

                $this->Usuario->nuevoPerfil($dataPerfil);

                $data["mensaje"] = "Usuario creado satisfactoriamente";
                $view["body"] = $this->load->view('app/registro', $data, TRUE);
                $this->parser->parse('template/body', $view);
            }
        }
    }

    public function solicitud()
    {
        $data["mensaje"] = "";
        $data["activeTab"] = "solicitud";
        $view["title"] = "Solicitud";

        $this->form_validation->set_rules('nombre_empresa', 'Nombre empresa', 'required');
        $this->form_validation->set_rules('establecimiento', 'Establecimiento', 'required');
        $this->form_validation->set_rules('direccion', 'Direccion', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $view["body"] = $this->load->view('app/solicitud', $data, TRUE);
            $this->parser->parse('template/body', $view);
        } else {
            if ($this->Solicitud->comprobarEmail($this->input->post('email'))) {
                $data["mensaje"] = "El correo ya existe";
                $view["body"] = $this->load->view('app/solicitud', $data, TRUE);
                $this->parser->parse('template/body', $view);
            } else {

                $datosEmpresa = array(
                    'nombre_empresa' => $this->input->post('nombre_empresa'),
                    'aprobada' => "no",
                    'created_at' => date('Y-m-d H:i:s')

                );

                $datosEstablecimiento = array(
                    'nombre_establecimiento' => $this->input->post('establecimiento'),
                    'direccion' => $this->input->post('direccion'),
                    'tipo' => 'Cultura'
                );

                $datosGerente = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellidos' => $this->input->post('apellidos'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'perfil' => 3,
                    'created_at' => date('Y-m-d H:i:s')

                );

                $this->Solicitud->nuevaSolicitud($datosEmpresa, $datosEstablecimiento, $datosGerente);

                $id_gerente = $this->Solicitud->getIdByEmail($this->input->post('email'));

                $this->Solicitud->actualizarDatos($id_gerente->id, $this->input->post('nombre_empresa'), $this->input->post('establecimiento'));

                $data["mensaje"] = "Solicitud de empresa registrada satisfactoriamente. Espere confirmación.";
                $view["body"] = $this->load->view('app/solicitud', $data, TRUE);
                $this->parser->parse('template/body', $view);
            }
        }
    }
}
