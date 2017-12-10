<?php 

/**
* 
*/
class Categorias extends CI_Controller{

	private $permisos;
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Categoria_model");
	}
	public function index(){
		$data = array(
			'categoria' => $this->Categoria_model->getCategorias(),
			'permisos' => $this->permisos
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

		$this->form_validation->set_rules("nombre","Nombre","required|is_unique[categoria.nombre]");
		if($this->form_validation->run()){
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
		}else{
			$this->add();
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

		$categoriaActual = $this->Categoria_model->getCategoria($id);
		if($nombre == $categoriaActual->nombre){
			$unique = '';
		}else{
			$unique = '|is_unique[categoria.nombre]';
		}

		$this->form_validation->set_rules("nombre","Nombre","required".$unique);
		if($this->form_validation->run()){
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
		}else{
			$this->edit($id);
		}
	}

	public function view($id){
		$data = array(
			'categoria' => $this->Categoria_model->getCategoria($id),
		);
		$this->load->view("admin/categorias/view",$data);
	}

	public function delete($id){		
		$data = array(
			'estado' => "0",
			'fecha_baja' => date("Y-m-d H:i:s"),
			'usuario_baja' => $this->session->userdata('usuario'),
		);
		$this->Categoria_model->update($id,$data);
		echo 'mantenimiento/categorias';
	}
}
 ?>