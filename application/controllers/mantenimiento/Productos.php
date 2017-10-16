<?php 

/**
* 
*/
class Productos extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Productos_model');
		$this->load->model('Categoria_model');
	}

	public function index(){
		$data = array(
			'productos' => $this->Productos_model->getProductos(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/list',$data);
		$this->load->view('layouts/footer');
	}

	public function add(){
		$data = array(
			'categorias' => $this->Categoria_model->getCategorias(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/add',$data);
		$this->load->view('layouts/footer');
	}

	public function store(){
		$codigo = $this->input->post('codigo');
		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');
		$precio = $this->input->post('precio');
		$stock = $this->input->post('stock');
		$categoria = $this->input->post('categoria');		
		$data = array(
			'codigo' => $codigo,
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'precio' => $precio,
			'stock' => $stock,
			'categoria' => $categoria,
			'status' => '1'
		);
		if ($this->Productos_model->save($data)) {
			redirect(base_url().'mantenimiento/productos');
		} else {
			$this->session->set_flashdata('error','No se puede guardar la informacion');
			redirect(base_url().'mantenimiento/productos/add');
		}
		
	}

	public function edit($id){
		$data = array(
			'productos' => $this->Productos_model->getProducto($id),
			'categorias' => $this->Categoria_model->getCategorias(),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/edit',$data);
		$this->load->view('layouts/footer');
	}

	public function update(){
		$id = $this->input->post('producto');
		$codigo = $this->input->post('codigo');
		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');
		$precio = $this->input->post('precio');
		$stock = $this->input->post('stock');
		$categoria = $this->input->post('categoria');
		$data = array(
			'codigo' => $codigo,
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'precio' => $precio,
			'stock' => $stock,
			'categoria' => $categoria
		);

		if ($this->Productos_model->update($id,$data)) {
			redirect(base_url().'mantenimiento/productos');
		} else {
			$this->session->set_flashdata('error','No se puede actualizar la informacion');
			redirect(base_url().'mantenimiento/productos/edit/'.$id);
		}
		
	}

	public function view($id){
		$data = array(
			'productos' => $this->Productos_model->getCategoria($id),
		);
		$this->load->view("admin/productos/view",$data);
	}

	public function delete($id){		
		$data = array(
			'status' => "0",
		);
		$this->Productos_model->update($id,$data);
		echo 'mantenimiento/productos';
	}
}
 ?>
