<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index()
	{
        $data['title'] = 'Prueba';
		$data['subview'] = $this->load->view('form_login','', TRUE);
		$this->load->view('template/main',$data);		
    }
}