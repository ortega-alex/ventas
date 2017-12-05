<?php 

/**
* 
*/
class Ventas extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 
		$this->load->model("ventas_model");
	}

	public function index(){
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if($this->input->post("buscar")){
			$ventas = $this->ventas_model->getVentasbyDate($fechainicio,$fechafin);
		}else{
			$ventas = $this->ventas_model->getVentas();
		}
		$data = array(
			"ventas" => $ventas,
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/ventas",$data);
		$this->load->view("layouts/footer");
	}
}

?>