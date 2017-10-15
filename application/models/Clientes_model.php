<?php 

/**
* 
*/
class Clientes_model extends CI_Model
{
	public function getClientes(){
		return $this->db->where('status','1')
				->get('cliente')->result();
	}
}
 ?>