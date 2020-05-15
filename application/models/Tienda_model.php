<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tienda_model extends CI_Model {
    private $_db; //Declaro propiedad _db

    function __construct(){
        parent::__construct();			
        $this->_db = 'tienda'; // Inicializo propiedad tienda como tabla de este model
    }

    /**
	 * Obtener Tienda por ID
	 */
    function getTiendaById($id){
    $sql = "SELECT * FROM tienda WHERE id = {$this->db->escape($id)}"; 
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        } else {
            $results = NULL;
        }
        return $results;
    }

     /**
	 * Obtener Tienda por ID
	 */
    function getAll(){
        $sql = "SELECT * FROM tienda ORDER BY tienda.id ASC"; 
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        } else {
            $results = NULL;
        }
        return $results;
    }

    function addTienda($data){
        if ($data) {
            $sql = "INSERT INTO tienda (nombre, email, phone, descripcion, create_date) VALUES (
                {$this->db->escape($data['nombre'])},
                {$this->db->escape($data['email'])},
                {$this->db->escape($data['phone'])},
                {$this->db->escape($data['descripcion'])},
                {$this->db->escape($data['create_date'])}
            )";


            $this->db->query($sql);

            if ($id = $this->db->insert_id()) {
                return $id;
            }
        }

        return FALSE;
    }
}