<?php 

/**
* 
*/
class Clientes extends CI_Controller{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('Clientes_model');
	}
	
	public function index(){
		$data = array(
			'clientes' => $this->Clientes_model->getClientes(),
		 );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/list',$data);
		$this->load->view('layouts/footer');
	}
}
 ?>