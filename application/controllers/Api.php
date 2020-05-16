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
            $this->response([$productos,'accion' => $this->success_log()], 200);
        }else
        {
            // Set the response and exit
            $this->response( [
                'status' => false,
                'message' => 'No hay productos',
                'accion' => $this->error_log()
            ], 404 );
        } 
        
    }
    function error_log(){
        $objfecha = new DateTime();
        $fecha = $objfecha->format('Y-m-d-H-i-s');
        $doc_log = fopen('writed_logs.txt','a');
        fwrite($doc_log,"Conexión Fallida  -- ".$fecha." -- status '400'\r\n");
        fclose($doc_log);
        return 'error';
    }

    function success_log(){
        $objfecha = new DateTime();
        $fecha = $objfecha->format('Y-m-d-H-i-s');
        $doc_log = fopen('writed_logs.txt','a');
        fwrite($doc_log,"Conexión Exitosa  -- ".$fecha." -- status '200'\r\n");
        fclose($doc_log);
        return 'success';
    }

}
