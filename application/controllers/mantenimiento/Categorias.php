<?php 

/**
* 
*/
class Categorias extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("Categoria_model");
	}
	public function index(){
		$data = array(
			'categoria' => $this->Categoria_model->getCategorias(),
		 );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/list',$data);
		$this->load->view('layouts/footer');
	}

	public function add(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/add');
		$this->load->view('layouts/footer');
	}

	public function store(){
		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');

		$data = array(
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'estado' => '1',
			'fecha_alta' => date("Y-m-d H:i:s")
		);
		if ($this->Categoria_model->save($data)) {
			redirect(base_url().'mantenimiento/categorias');
		} else {
			$this->session->set_flashdata('error','No se puede guardar la informacion');
			redirect(base_url().'mantenimiento/categorias/add');
		}
		
	}

	public function edit($id){
		$data = array(
			'categoria' => $this->Categoria_model->getCategoria($id),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/categorias/edit',$data);
		$this->load->view('layouts/footer');
	}

	public function update(){
		$id = $this->input->post('idCategoria');
		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');
		$data = array(
			'nombre' => $nombre,
			'descripcion' => $descripcion
		);

		if ($this->Categoria_model->update($id,$data)) {
			redirect(base_url().'mantenimiento/categorias');
		} else {
			$this->session->set_flashdata('error','No se puede actualizar la informacion');
			redirect(base_url().'mantenimiento/categorias/edit/'.$id);
		}
		
	}
}
 ?>