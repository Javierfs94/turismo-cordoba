<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Registro extends CI_Controller
{
    public function __construct()
    {
        /*call CodeIgniter's default Constructor*/
        parent::__construct();

        /*load database libray manually*/
        $this->load->database();

        /*load Model*/
        //$this->load->model('Registro');
    }
    /*Display*/
    public function index()
    {
        $view["title"] = "Registro";
        $view["body"] = $this->load->view('admin/registro/index', NULL, TRUE);
        $this->parser->parse('admin/template/body', $view);
    }

    public function form()
    {
        $this->form_validation->set_rules();
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
    }
}
