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
    
    public function contarProductos(){
        $id_tienda = $this->input->post('id_tienda');
        $products = $this->Producto_model->productsByIdTienda($id_tienda);
        
        if($products != null){
            $last_id = array_key_last($products);

        }else{
            $last_id = -1;

        }

        echo json_encode($last_id);
    }

    public function addProducto(){
        //print_r($_FILES);
        $producto = [
                        'id_tienda'     => $this->input->post('id_tienda'),
                        'nombre'        => $this->input->post('nombre2'),
                        'sku'           => $this->input->post('sku'),
                        'descripcion'   => $this->input->post('descripcion2'),
                        'valor'         => $this->input->post('valor')
        ];
        
        
        //$usuario = (Object)$this->session->userdata['current_user'];       
        
        $config['upload_path']    ='./assets/images';
        $config['file_name']      = $producto['sku'];
        $config['allowed_types']  = 'jpg|jpeg|png|pdf';
        $config['overwrite']     = true;
        $config['max_size']      = 6000;
        $this->load->library('upload', $config);
        

        if ( ! $this->upload->do_upload('imagen'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error','Verifique: (1) Cargar Todos los documentos (2) Archivos permitidos .png|.jpg|.jpeg|pdf');
            print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $filename = $data['upload_data']['file_name'];
            $producto['imagen'] = $filename;

            $add = $this->Producto_model->addProducto($producto);

            if($add != false){
                $this->session->set_flashdata('success','Su producto ha sido guardado exitosamente. Podrá listarlos en el menu de opciones');
            }else{
                $this->session->set_flashdata('error','Oops. Al parecer algo ha salido mal y no se ha guardado la información correctamente, intenta de nuevo.');
            }
        }
        redirect(base_url('main/succesfull_admin_login'));
        //print_r($producto);
    }

    function listar_productos(){
        $productos = $this->Producto_model->getAll();
        $data['title'] = 'Prueba';
        $content_data= [
            'user'      => $this->session->userdata(),
            'productos' => $productos
        ];
		$data['subview'] = $this->load->view('productos/listar',$content_data, TRUE);
		$this->load->view('templates/productos',$data);
    }
    
}