<?php 

/**
* 
*/
class Dashboard extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 
		$this->load->model('Ventas_model');
	}

	public function index(){
		$data = array(
			'canVentas' => $this->Backend_model->rowCont('venta'),
			'canClientes' => $this->Backend_model->rowCont('cliente'),
			'canProductos' => $this->Backend_model->rowCont('productos'),
			'canUsuarios' => $this->Backend_model->rowCont('usuario'),
			'years' => $this->Ventas_model->years()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('layouts/footer');
	}

	public function getData(){
		$year = $this->input->post('year');
		$resultado = $this->Ventas_model->montos($year);
		echo json_encode($resultado);
	}
}
 ?>