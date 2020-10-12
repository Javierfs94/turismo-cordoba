<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $view["title"] = "Admin";
        $view["body"] = $this->load->view('admin/template/home', NULL, TRUE);
        $this->parser->parse('admin/template/body', $view);
    }
}
