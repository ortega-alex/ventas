<?php 

/**
* 
*/
class Usuarios_model extends CI_Model{

	public function login($username,$password){
		$resultados = $this->db->where('username',$username)
								->where('password',$password)
								->get('usuario');
		
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}else{
			return false;
		}
	}

	public function getUsuarios(){
		return $this->db->select('a.*,b.nombre as roll')
					->from('usuario a')
					->join('roles b','a.rol = b.rol')
					->where('a.status',1)
					->get()
					->result();
	}

	public function getRoles(){
		return $this->db->get('roles')
						->result();
	}

	public function save($data){
		return $this->db->insert("usuario",$data);
	}

	public function getUsuario($id){
		return $this->db->select('a.*,b.nombre as roll')
					->from('usuario a')
					->join('roles b','a.rol = b.rol')
					->where('a.usuario',$id)
					->get()
					->row();
	}

	public function update($id,$data){
		$this->db->where('usuario',$id)
					->update('usuario',$data);
		return true;
	}


}
 ?>