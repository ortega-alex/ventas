<?php 

/**
* 
*/
class Clientes extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 
		$this->load->model("Clientes_model");
	}

	public function index(){
		$documento = $this->input->post("documento");
		if($this->input->post("buscar")){
			$clientes = $this->Clientes_model->getClientesbyDate($documento);
		}else{
			$clientes = $this->Clientes_model->getClientes();
		}
		$data = array(
			"clientes" => $clientes,
			"documento" => $documento
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/clientes",$data);
		$this->load->view("layouts/footer");
	}
}

?>