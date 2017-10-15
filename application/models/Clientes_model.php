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

	public function save($data){
		return $this->db->insert("cliente",$data);
	}

	public function getCliente($id){
		return $this->db->where('cliente',$id)
					->get('cliente')
					->row();
	}

	public function update($id,$data){
		$this->db->where('cliente',$id)
					->update('cliente',$data);
		return true;
	}

}
 ?>