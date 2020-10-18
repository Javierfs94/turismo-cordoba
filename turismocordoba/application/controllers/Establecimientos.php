<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EStablecimientos extends CI_Controller
{
    public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	$this->load->database();
	
	/*load Model*/
	$this->load->model('Establecimiento');
	}
   /*Display*/
	public function index()
	{
    $data['establecimientos']=$this->Establecimiento->display_records();
    //$data['nombreEmpresa']=$this->Oferta->nombre_empresa($postData['nombre_empresa']);
    $view["title"] = "Establecimientos";
    $view["body"] = $this->load->view('admin/establecimientos/index', $data, TRUE);
    $this->parser->parse('admin/template/body', $view);
    }
    function save()
    {
        $data = $this->Oferta->añadir_establecimiento();
        echo json_encode($data);
    }

    function update()
    {
        $data = $this->Oferta->modificar_establecimiento();
        echo json_encode($data);
    }

    function delete()
    {
        $data = $this->Oferta->borrar_establecimiento();
        echo json_encode($data);
    }
    
	
}
