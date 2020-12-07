<?php
class Error_404 extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
   }

   public function index()
   {
      $this->output->set_status_header('404');
      $data["activeTab"] = "home";
      $view["body"] = $this->load->view('errors/error_404', $data, TRUE);
      $this->parser->parse('template/body', $view);
   }
}
