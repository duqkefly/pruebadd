<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Producto_model extends CI_Model {
    private $_db; //Declaro propiedad _db

    function __construct(){
        parent::__construct();			
        $this->_db = 'producto'; // Inicializo propiedad producto como tabla de este model
    }   

    function productsByIdTienda($id_tienda){
        $sql = "SELECT * FROM producto WHERE id_tienda = $id_tienda";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        } else {
            $results = NULL;
        }
        return $results;
    }
}