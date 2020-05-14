<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tienda_model extends CI_Model {
    private $_db; //Declaro propiedad _db

    function __construct(){
        parent::__construct();			
        $this->_db = 'tienda'; // Inicializo propiedad users como tabla de este model
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
}