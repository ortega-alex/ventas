<?php 

/**
* 
*/
class Categorias extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 
		$this->load->model("Categoria_model");
	}

	public function index(){
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if($this->input->post("buscar")){
			$categorias = $this->Categoria_model->getCategoriasbyDate($fechainicio,$fechafin);
		}else{
			$categorias = $this->Categoria_model->getCategorias();
		}
		$data = array(
			"categorias" => $categorias,
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/categorias",$data);
		$this->load->view("layouts/footer");
	}
}
