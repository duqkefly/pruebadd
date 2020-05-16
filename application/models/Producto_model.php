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

    /**
	 * Obtener todos
	 */
    function getAll(){
        $sql = "SELECT * FROM producto ORDER BY producto.id ASC"; 
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        } else {
            $results = NULL;
        }
        return $results;
    }

    function addProducto($data){
        if ($data) {
            $sql = "INSERT INTO producto (id_tienda,nombre, sku, descripcion, valor, imagen) VALUES (
                {$this->db->escape($data['id_tienda'])},
                {$this->db->escape($data['nombre'])},
                {$this->db->escape($data['sku'])},
                {$this->db->escape($data['descripcion'])},
                {$this->db->escape($data['valor'])},
                {$this->db->escape($data['imagen'])}
            )";


            $this->db->query($sql);

            if ($id = $this->db->insert_id()) {
                return $id;
            }
        }

        return FALSE;
    }

}