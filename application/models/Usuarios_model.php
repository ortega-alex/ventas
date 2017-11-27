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
}
 ?>