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
		$secret_key = "6Lfv6_YUAAAAAIkYbLtKFybQN89KQ-BuplNkYKNN";
		$token = $this->input->post('token');
		$recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $token);
		
		$recaptcha = json_decode($recaptcha);
	
		if($recaptcha->score >= 0.6){ //0.6 secure value
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$credentials = ['email' => $email, 'password' => $password];
			$this->login($credentials);
		}else{
			echo 'Sugerimos intentar en unos minutos y limpiar la cache de su navegador debido a que al parecer ha hecho demasiados intentos';
		}
	}

	/**
	 * Validacion de Credenciales y redireccion via JS
	 */
	public function login($credentials){
		//print_r($credentials['email']);
		if($credentials['email'] != "" || $credentials['password'] != ""){
			echo 'false';
		}else{
			$login = $this->Users_model->login($credentials['email'] , $credentials['password']);
			//print_r($login['is_admin']);
			if(is_array($login)){
				if(preg_match("/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/",$credentials['password'])){
					if($login['is_admin'] == 1){
						echo true; //admin panel
					}else{//demas consideraciones en cuanto a planes deberan evaluarse aqui
						echo 2; //user panel
					}
				}else{
					echo 3; //update password panel
				}				
			}else{
				echo false; //not logged
			}		
		}
	}

	/**
	 * redireccion a panel de Admin
	 */
	public function succesfull_admin_login(){
		echo "admin exitoso";
	}

	/**
	 * redireccion a panel de usuario
	 */
	public function succesfull_user_login(){
		echo "user exitoso";
	}

	/**
	 * redireccion a formulario de update
	 */
	public function updatePassword(){ 
		echo "redireccion a update password";
	}

	
}