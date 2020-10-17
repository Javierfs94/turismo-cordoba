<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ofertas extends CI_Controller
{
    public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('Oferta');
	}
   /*Display*/
	public function index()
	{
    $data['ofertas']=$this->Oferta->display_records();
    //$data['nombreEmpresa']=$this->Oferta->nombre_empresa($postData['nombre_empresa']);
    $view["title"] = "Ofertas";
    $view["body"] = $this->load->view('admin/ofertas/index', $data, TRUE);
    $this->parser->parse('admin/template/body', $view);
    }
    function save()
    {
        $data = $this->Oferta->añadir_oferta();
        echo json_encode($data);
    }

    function update()
    {
        $data = $this->Oferta->modificar_oferta();
        echo json_encode($data);
    }

    function delete()
    {
        $data = $this->Oferta->borrar_oferta();
        echo json_encode($data);
    }
    
	
}
