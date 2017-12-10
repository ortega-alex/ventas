<?php 

/**
* 
*/
class Permisos extends CI_Controller{
	
	private $permi;
	function __construct(){
		parent::__construct();
		$this->load->model('Permisos_model');
		$this->load->model('Usuarios_model');
		$this->permi = $this->backend_lib->control();
	}

	public function index(){
		$data = array(
			'permisos' => $this->Permisos_model->getPermisos(),
			'permi' => $this->permi
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/list',$data);
		$this->load->view('layouts/footer');
	}

	public function add(){
		$data = array(
			'menus' => $this->Permisos_model->getMenus(),
			'roles' => $this->Usuarios_model->getRoles()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/add',$data);
		$this->load->view('layouts/footer');
	}

	public function store(){
		$menu = $this->input->post('menu');
		$rol = $this->input->post('rol');
		$read = $this->input->post('read');
		$insert = $this->input->post('insert');
		$update = $this->input->post('update');		
		$delete = $this->input->post('delete');	

		$this->form_validation->set_rules("menu","Menu a seleccionar","required");		
		$this->form_validation->set_rules("rol","Rol del usuario","required");

		if ($this->form_validation->run()) {
			$data = array(
				'menu_id' => $menu,
				'rol_id' => $rol,
				'read' => $read,
				'insert' => $insert,
				'update' => $update,
				'delete' => $delete
			);
			if ($this->Permisos_model->save($data)) {
				redirect(base_url().'administrador/permisos');
			} else {
				$this->session->set_flashdata('error','No se puede guardar la informacion');
				redirect(base_url().'administrador/permisos/add');
			}
		} else {
			$this->add();
		}			
	}

	public function edit($id){
		$data = array(
			'permisos' => $this->Permisos_model->getPermiso($id),
			'menus' => $this->Permisos_model->getMenus(),
			'roles' => $this->Usuarios_model->getRoles()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/permisos/edit',$data);
		$this->load->view('layouts/footer');
	}

	public function update(){
		$id = $this->input->post('permiso');
		$read = $this->input->post('read');
		$insert = $this->input->post('insert');
		$update = $this->input->post('update');		
		$delete = $this->input->post('delete');	

		$data = array(
			'read' => $read,
			'insert' => $insert,
			'update' => $update,
			'delete' => $delete
		);

		if ($this->Permisos_model->update($id,$data)) {
			redirect(base_url().'administrador/permisos');
		} else {
			$this->session->set_flashdata('error','No se puede actualizar la informacion');
			redirect(base_url().'administrador/permisos/edit/'.$id);
		}
		
	}

	public function delete($id){		
		$data = array(
			'read' => "0",
			'insert' => "0",
			'update' => "0",
			'delete' => "0"
		);
		$this->Permisos_model->update($id,$data);
		echo 'administrador/permisos';
	}
}
 ?>