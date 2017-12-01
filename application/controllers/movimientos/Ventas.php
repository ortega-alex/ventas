<?php 

/**
* 
*/
class Ventas extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Ventas_model');
	}

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/ventas/list');
		$this->load->view('layouts/footer');	
	}

	public function add(){
		$data = array(
						"tipoComprobantes" => $this->Ventas_model->getComprobante()
					);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/ventas/add',$data);
		$this->load->view('layouts/footer');	
	}

}

 ?>