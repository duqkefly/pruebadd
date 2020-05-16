<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
        parent::__construct();			
        $this->load->model('Tienda_model');
    }
	
	public function index()
	{
		$this->session->sess_destroy();
        $data['title'] = 'Prueba';
		$data['subview'] = $this->load->view('form_login','', TRUE);
		$this->load->view('templates/main',$data);		
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
		if($credentials['email'] == "" || $credentials['password'] == ""){
			echo false;
		}else{
			$login = $this->Users_model->login($credentials['email'] , $credentials['password']);
			//print_r($login);
			if(is_array($login)){
				$this->session->set_userdata($login);
				$this->session->set_userdata(array('logged_in' => true));
				if(preg_match("/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/",$credentials['password'])){
					if($login['is_admin'] == 1){
						echo true; //admin panel
					}else{//demas consideraciones en cuanto a planes deberan evaluarse aqui
						echo 2; //user panel
					}
				}else{
					echo 3; //Redirecciones si fueren necesarias
				}				
			}else{
				echo false; //not logged
				$this->session->sess_destroy(); //Destruccion de sesion en caso de not login
			}
		}
	}

	/**
	 * redireccion a panel de Admin
	 */
	public function succesfull_admin_login(){
		if(isset($this->session->userdata) && ($this->session->userdata['is_admin'] == 1)){
			$tienda = $this->Tienda_model->getAll();
			if($tienda != null){
				$data['title'] = 'Panel Admin';
				$content_data= [
								'user' => $this->session->userdata(),
								'tienda' => $tienda
				];
				$data['subview'] = $this->load->view('admin/main',$content_data, TRUE);
				$this->load->view('templates/admin',$data);
			}else{
				$data['title'] = 'Agregar Tienda';
				$content_data= [
					'user' => $this->session->userdata()
				];
				$data['subview'] = $this->load->view('admin/addTienda',$content_data, TRUE);
				$this->load->view('templates/addTiendas',$data);
			}			
		}else{
			$this->session->sess_destroy();
			redirect(base_url());
		}
		
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

	public function kill_session(){
		$this->session->sess_destroy();
		redirect(base_url());

	}

	
}