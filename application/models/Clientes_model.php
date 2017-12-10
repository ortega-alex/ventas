<?php 

/**
* 
*/
class Clientes_model extends CI_Model
{
	public function getClientes(){
		return $this->db->select('a.*,b.nombre as tipoCliente,c.nombre as tipoDocumento')
						->from("cliente a")
						->join("tipo_cliente b","a.tipo_cliente = b.tipo_cliente")
						->join("tipo_documento c","a.tipo_documento = c.tipo_documento")
						->where("a.status","1")
						->get()
						->result();
	}

	public function save($data){
		return $this->db->insert("cliente",$data);
	}

	public function getCliente($id){
		return $this->db->select('a.*,b.nombre as tipoCliente,c.nombre as tipoDocumento')
						->from("cliente a")
						->join("tipo_cliente b","a.tipo_cliente = b.tipo_cliente")
						->join("tipo_documento c","a.tipo_documento = c.tipo_documento")
						->where("a.cliente",$id)
						->get()
						->row();
	}

	public function update($id,$data){
		$this->db->where('cliente',$id)
					->update('cliente',$data);
		return true;
	}

	public function getDocumento($numero){
		$row = $this->db->where('num_documento',$numero)
						->get('cliente')
						->row();
		if(empty($row )){
			return true;
		}else{
			return false;
		}				

	}

	public function getTipoCliente(){
		return $this->db->get("tipo_cliente")
						->result();
	}

	public function getTipoDocumento(){
		return $this->db->get("tipo_documento")
						->result();
	}

	public function getClientesbyDate($documento){
		return $this->db->select('a.*,b.nombre as tipoCliente,c.nombre as tipoDocumento')
						->from("cliente a")
						->join("tipo_cliente b","a.tipo_cliente = b.tipo_cliente")
						->join("tipo_documento c","a.tipo_documento = c.tipo_documento")
						->where("a.status","1")
						->where('a.num_documento',$documento)
						->get()
						->result();	
	}
}
 ?>