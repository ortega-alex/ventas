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

	public function add(){
		$data = array(
						"tipoClientes" => $this->Clientes_model->getTipoCliente(),
						"tipoDocumentos" => $this->Clientes_model->getTipoDocumento() 
					);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/add',$data);
		$this->load->view('layouts/footer');
	}

	public function store(){
		$nombre = $this->input->post('nombre');
		$direccion = $this->input->post('direccion');
		$telefono = $this->input->post('telefono');
		$tipoCliente = $this->input->post('tipoCliente');
		$tipoDocumento = $this->input->post('tipoDocumento');		
		$numDocumento = $this->input->post('numDocumento');

		if($this->Clientes_model->getDocumento($numDocumento)){
			$data = array(
				'nombre' => $nombre,
				'direccion' => $direccion,
				'telefono' => $telefono,
				'tipo_cliente' => $tipoCliente,
				'tipo_documento' => $tipoDocumento,
				'num_documento' => $numDocumento,
				'status' => '1',
				'fecha_ingreso' => date("Y-m-d H:i:s")
			);
			if ($this->Clientes_model->save($data)) {
				redirect(base_url().'mantenimiento/clientes');
			} else {
				$this->session->set_flashdata('error','No se puede guardar la informacion');
				redirect(base_url().'mantenimiento/clientes/add');
			}
		}else{
			$this->session->set_flashdata('error','No se puede guardar la informacion el numero de documento ya existe');
			redirect(base_url().'mantenimiento/clientes/add');
		}	
		
	}

	public function edit($id){
		$data = array(
			'clientes' => $this->Clientes_model->getCliente($id),
			'tipoClientes' => $this->Clientes_model->getTipoCliente(),
			'tipoDocumentos' => $this->Clientes_model->getTipoDocumento()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/edit',$data);
		$this->load->view('layouts/footer');
	}

	public function update(){
		$id = $this->input->post('cliente');
		$nombre = $this->input->post('nombre');
		$tipoCliente = $this->input->post('tipoCliente');
		$tipoDocumento = $this->input->post('tipoDocumento');
		$direccion = $this->input->post('direccion');
		$telefono = $this->input->post('telefono');
		$numDocumento = $this->input->post('numDocumento');
		$data = array(
			'nombre' => $nombre,
			'tipo_cliente' => $tipoCliente,
			'tipo_documento' => $tipoDocumento,
			'direccion' => $direccion,
			'telefono' => $telefono,
			'num_documento' => $numDocumento,
		);

		if ($this->Clientes_model->update($id,$data)) {
			redirect(base_url().'mantenimiento/clientes');
		} else {
			$this->session->set_flashdata('error','No se puede actualizar la informacion');
			redirect(base_url().'mantenimiento/clientes/edit/'.$id);
		}
		
	}

	public function view($id){
		$data = array(
			'clientes' => $this->Clientes_model->getCliente($id),
		);
		$this->load->view("admin/categorias/view",$data);
	}

	public function delete($id){		
		$data = array(
			'status' => "0",
			'fecha_baja' => date("Y-m-d H:i:s"),
			'usuario_baja' => $this->session->userdata('usuario'),
		);
		$this->Clientes_model->update($id,$data);
		echo 'mantenimiento/clientes';
	}
}
 ?>