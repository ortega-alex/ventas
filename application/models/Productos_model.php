<?php 

/**
* 
*/
class Productos_model extends CI_Model{
	
	public function getProductos(){
		return $this->db->select('a.*,b.nombre as categoria')
					->from('productos a')
					->join('categoria b','a.categoria = b.categoria')
					->where('status','1')
					->get()
					->result();
	}

	public function save($data){
		return $this->db->insert("productos",$data);
	}

	public function getProducto($id){
		return $this->db->select('a.*,b.nombre as categoria')
					->from('productos a')
					->join('categoria b','a.categoria = b.categoria')
					->where('producto',$id)
					->get()
					->row();
	}

	public function update($id,$data){
		$this->db->where('producto',$id)
					->update('productos',$data);
		return true;
	}

	public function getProductosbyDate($codigo){
		return $this->db->select('a.*,b.nombre as categoria , b.fecha_alta as fecha')
					->from('productos a')
					->join('categoria b','a.categoria = b.categoria')
					->where('status','1')
					->where('codigo',$codigo)
					->get()
					->result();
	}
}
 ?>