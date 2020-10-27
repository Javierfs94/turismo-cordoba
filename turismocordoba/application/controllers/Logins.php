<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logins extends CI_Controller
{
    public function __construct()
    {
        /*call CodeIgniter's default Constructor*/
        parent::__construct();

        /*load database libray manually*/
        $this->load->database();

        /*load Model*/
        $this->load->model('Login');
    }
    /*Display*/
    public function index()
    {
        $view["title"] = "Login";
        $view["body"] = $this->load->view('admin/login/index', NULL, TRUE);
        $this->parser->parse('admin/template/body', $view);
    }

    public function form()
    {
        echo "Logueado";
    }
}
