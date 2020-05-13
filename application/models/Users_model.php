<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
    private $_db; //Declaro propiedad _db

    function __construct(){
        parent::__construct();			
        $this->_db = 'users'; // Inicializo propiedad users como tabla de este model
    }

    /**
	 * Obtener Data de usuario por ID
	 */
    function getUsersById($id){
        $sql = "SELECT * FROM users WHERE id = {$id}"; 
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $results = $query->result_array();
        } else {
            $results = NULL;
        }
        return $results;
    }

    /**
	 * Validacion de credenciales de login
	 */
    function login($username = NULL, $password = NULL)
    {				
        if ($username && $password)
        {
            $sql = "
                SELECT * FROM users
                WHERE (username = " . $this->db->escape($username) . "
                        OR email = " . $this->db->escape($username) . ")
                    AND status = '1'
                    AND deleted = '0'
                LIMIT 1";

            $query = $this->db->query($sql);
            if ($query->num_rows())
            {
                $results = $query->row_array();
                $salted_password = hash('sha512', $password . $results['salt']);
                if ($results['password'] == $salted_password)
                {
                    unset($results['password']);
                    unset($results['salt']);
                    return $results;
                }
            }
        }
        return FALSE;
    }

}//End Model