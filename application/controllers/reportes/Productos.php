<?php 

/**
* 
*/
class Productos extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 
		$this->load->model("Productos_model");
	}

	public function index(){
		$codigo = $this->input->post("codigo");
		if($this->input->post("buscar")){
			$productos = $this->Productos_model->getProductosbyDate($codigo);
		}else{
			$productos = $this->Productos_model->getProductos();
		}
		$data = array(
			"productos" => $productos,
			"codigo" => $codigo
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/productos",$data);
		$this->load->view("layouts/footer");
	}
}

?>