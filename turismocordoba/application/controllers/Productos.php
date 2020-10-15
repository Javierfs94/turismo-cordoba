<?php
class Productos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Producto');
    }
    function index()
    {
        $view["title"] = "Productos";
        $view["body"] = $this->load->view('admin/productos/index', NULL, TRUE);
        $this->parser->parse('admin/template/body', $view);
    }

    function product_data()
    {
        $data = $this->product_model->product_list();
        echo json_encode($data);
    }

    function save()
    {
        $data = $this->product_model->save_product();
        echo json_encode($data);
    }

    function update()
    {
        $data = $this->product_model->update_product();
        echo json_encode($data);
    }

    function delete()
    {
        $data = $this->product_model->delete_product();
        echo json_encode($data);
    }
}
