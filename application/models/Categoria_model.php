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
		$this->db->where('estado','1');
		$resultados = $this->db->get('categoria');
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("categoria",$data);
	}

	public function getCategoria($id){
		$this->db->where('categoria',$id);
		$resultado = $this->db->get('categoria');
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where('categoria',$id);
		$this->db->update('categoria',$data);
		return true;
	}
}
 ?>