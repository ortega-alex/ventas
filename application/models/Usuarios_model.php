<?php 

/**
* 
*/
class Usuarios_model extends CI_Model{

	public function login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);

		$resultados = $this->db->get('usuario');
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}else{
			return false;
		}
	}
}
 ?>