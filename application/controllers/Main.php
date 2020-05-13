<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index()
	{
        $data['title'] = 'Prueba';
		$data['subview'] = $this->load->view('form_login','', TRUE);
		$this->load->view('template/main',$data);		
	}
	
	public function recaptcha(){
		$secret_key = "6LfWuOEUAAAAALk-fP1oChRx-pxOVOZiMcToaJHs";
		$token = $this->input->post('token');
		$recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $token);
		
		$recaptcha = json_decode($recaptcha);
	
		if($recaptcha->score >= 0.6){ //0.6 secure value
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$credentials = ['email' => $email, 'password' => $password];
			//$this->login($credentials);
			echo 1; // 1 admin 2 user
		}else{
			echo 'datos de captcha erroneos';
		}		
	}

	
}