<?php

require(APPPATH.'libraries/RestController.php');

class Api extends REST_Controller{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    function index_get($id = ''){
        $id_producto = $this->uri->segment(2);
        $productos = $this->Producto_model->productsByIdTienda($id_producto);
        if($productos != null){
            $this->response($productos, 200);
        }else
        {
            // Set the response and exit
            $this->response( [
                'status' => false,
                'message' => 'No hay productos'
            ], 404 );
        }
        
    }

    /* function index_post($id = ''){
        $id_producto = $this->uri->segment(2);
        $productos = $this->Producto_model->productsByIdTienda($id_producto);
        $this->response($productos, 200);
    } */
}
