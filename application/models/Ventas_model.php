<?php 

/**
* 
*/
class Ventas_model extends CI_Model{
	public function getComprobantes(){
		return $this->db->get('tipo_comprobante')
						->result();
	}

	public function getComprobante($id){
		return $this->db->where("tipo_comprobante",$id)
						->get("tipo_comprobante")
						->row();
	}

	public function getProductos($valor){
		return $this->db->select('producto as id,codigo,nombre as label,precio,stock')
						->from('productos')
						->like('nombre',$valor)
						->get()
						->result_array();
	}

	public function save($data){
		return $this->db->insert("venta",$data);
	}

	public function lastId(){
		return $this->db->insert_id();
	}

	public function updateComprobante($id,$data){
		$this->db->where("tipo_comprobante",$id)
				 ->update("tipo_comprobante",$data);
	}

	public function saveDetalleVenta($data){
		$this->db->insert("detalle_venta",$data);
	}
}

 ?>