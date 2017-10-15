<?php 

/**
* 
*/
class Categoria_model extends CI_Model
{
	
	function __construct(){
		# code...
	}

	public function getCategorias(){
		return $this->db->where('estado','1')
					->get('categoria')
					->result();
	}

	public function save($data){
		return $this->db->insert("categoria",$data);
	}

	public function getCategoria($id){
		return $this->db->where('categoria',$id)
					->get('categoria')
					->row();
	}

	public function update($id,$data){
		$this->db->where('categoria',$id)
					->update('categoria',$data);
		return true;
	}
}
 ?>