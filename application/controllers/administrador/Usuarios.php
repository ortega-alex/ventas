<?php 
/**
* 
*/
class Usuarios extends CI_Controller{
	
	private $permisos;
	function __construct()	{
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 
		$this->permisos = $this->backend_lib->control();
		$this->load->model('Usuarios_model');
	}

	public function index(){
		$data = array(
			'usuarios' => $this->Usuarios_model->getUsuarios(),
			'permisos' => $this->permisos
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/list',$data);
		$this->load->view('layouts/footer');
	}

	public function add(){
		$data = array(
			'roles' => $this->Usuarios_model->getRoles()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/add',$data);
		$this->load->view('layouts/footer');
	}

	public function store(){
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$telefono = $this->input->post('telefono');
		$email = $this->input->post('email');
		$user = $this->input->post('user');		
		$pass = $this->input->post('pass');		
		$rol = $this->input->post('rol');

		$this->form_validation->set_rules("nombre","Nombre del usuario","required");
		$this->form_validation->set_rules("email","Email del usuario","required");
		$this->form_validation->set_rules("user","Usuar para el acceso","required");
		$this->form_validation->set_rules("pass","Password del usuario","required");		
		$this->form_validation->set_rules("rol","Rol del usuario","required");

		if ($this->form_validation->run()) {
			$data = array(
				'nombre' => $nombre,
				'apellido' => $apellido,
				'telefono' => $telefono,
				'email' => $email,
				'username' => $user,
				'password' => $pass,
				'status' => '1',
				'rol' => $rol
			);
			if ($this->Usuarios_model->save($data)) {
				redirect(base_url().'administrador/usuarios');
			} else {
				$this->session->set_flashdata('error','No se puede guardar la informacion');
				redirect(base_url().'administrador/usuarios/add');
			}
		} else {
			$this->add();
		}			
	}

	public function edit($id){
		$data = array(
			'usuarios' => $this->Usuarios_model->getUsuario($id),
			'roles' => $this->Usuarios_model->getRoles()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/edit',$data);
		$this->load->view('layouts/footer');
	}

	public function update(){
		$id = $this->input->post('usuario');
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$telefono = $this->input->post('telefono');
		$email = $this->input->post('email');
		$user = $this->input->post('user');		
		$pass = $this->input->post('pass');		
		$rol = $this->input->post('rol');	

		$this->form_validation->set_rules("nombre","Nombre del usuario","required");
		$this->form_validation->set_rules("email","Email del usuario","required");
		$this->form_validation->set_rules("user","Usuar para el acceso","required");
		$this->form_validation->set_rules("pass","Password del usuario","required");		
		$this->form_validation->set_rules("rol","Rol del usuario","required");

		if ($this->form_validation->run()) {
			$data = array(
				'nombre' => $nombre,
				'apellido' => $apellido,
				'telefono' => $telefono,
				'email' => $email,
				'username' => $user,
				'password' => $pass,
				'status' => '1',
				'rol' => $rol
			);

			if ($this->Usuarios_model->update($id,$data)) {
				redirect(base_url().'administrador/usuarios');
			} else {
				$this->session->set_flashdata('error','No se puede actualizar la informacion');
				redirect(base_url().'administrador/usuarios/edit/'.$id);
			}
			
		} else {
			$this->edit($id);
		}		
	}

	public function view(){
		$id = $this->input->post("id");
		$data = array(
			'usuario' => $this->Usuarios_model->getUsuario($id)
		);
		$this->load->view('admin/usuarios/view',$data);
	}

	public function delete($id){		
		$data = array(
			'status' => "0"
		);
		$this->Usuarios_model->update($id,$data);
		echo 'administrador/usuarios';
	}


}
 ?>