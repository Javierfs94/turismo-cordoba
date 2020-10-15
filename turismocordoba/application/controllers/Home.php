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
        $view["title"] = "Home";
        $view["body"] = $this->load->view('admin/home/index', NULL, TRUE);
        $this->parser->parse('admin/template/body', $view);
    }
}
