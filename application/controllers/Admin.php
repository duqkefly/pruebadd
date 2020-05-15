<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();			
        //$this->load->model('Tienda_model');
    }

    public function addTienda(){
        if($this->session->userdata['is_admin'] == 1){
            $data = [
                        'nombre'      => $this->input->post('nombre'),
                        'email'       => $this->input->post('email'),
                        'phone'       => $this->input->post('phone'),
                        'descripcion' => $this->input->post('descripcion'),
                        'create_date' => date('Y-m-d')
            ];
            $add = $this->Tienda_model->addTienda($data);
            if($add == false){
                $this->session->set_flashdata('error', 'Error al insertar los datos en BD');
                redirect(base_url('main/succesfull_admin_login'));
            }else{
                $this->session->set_flashdata('success', 'Tienda agregada exitosamente.');
                redirect(base_url('main/succesfull_admin_login'));
            }

        }else{
            $this->session->sess_destroy();
			redirect(base_url());
        }        
    }

    public function addProducto(){
        $id_tienda = $this->uri->segment(3);
        $data['title'] = 'Panel Admin';
        $content_data= [
                        'user' => $this->session->userdata(),
                        'id_tienda' => $id_tienda,
        ];
        $data['subview'] = $this->load->view('admin/add_producto',$content_data, TRUE);
        $this->load->view('templates/admin',$data);

    }

    public function contarProductos(){
        $id_tienda = $this->input->post('id_tienda');
        $cantProductos = count($this->Producto_model->countProducts($id_tienda));
        


		echo json_encode($cantProductos);

	}
}