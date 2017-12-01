<?php 

/**
* 
*/
class Ventas_model extends CI_Model{
	public function getComprobante(){
		return $this->db->get('tipo_comprobante')
						->result();
	}
}

 ?>