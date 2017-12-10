<?php 

/**
* 
*/
class Ventas_model extends CI_Model{

	public function getVentasbyDate($fechainicio,$fechafin){
		return $this->db->select("a.*,b.nombre as cliente,c.nombre as tipoComprobante")
						->from("venta a")
						->join("cliente b","a.cliente = b.cliente")
						->join("tipo_comprobante c","a.tipo_comprobante = c.tipo_comprobante")
						->where("a.fecha >= ",$fechainicio)
						->where("a.fecha <= ",$fechafin)
						->get()
						->result();
	}

	public function getVentas(){
		return $this->db->select("a.*,b.nombre as cliente,c.nombre as tipoComprobante")
						->from("venta a")
						->join("cliente b","a.cliente = b.cliente")
						->join("tipo_comprobante c","a.tipo_comprobante = c.tipo_comprobante")
						->get()
						->result();

	}

	public function getVenta($id){
		return $this->db->select("a.*,b.nombre as cliente,b.direccion,b.telefono,b.num_documento as documento,c.nombre as tipoComprobante")
						->from("venta a")
						->join("cliente b","a.cliente = b.cliente")
						->join("tipo_comprobante c","a.tipo_comprobante = c.tipo_comprobante")
						->where("a.venta",$id)
						->get()
						->row();
	}

	public function getDetalleVenta($id){
		return $this->db->select("a.*,b.codigo,b.nombre")
						->from("detalle_venta a")
						->join("productos b","a.producto = b.producto")
						->where("a.venta",$id)
						->get()
						->result();
	}

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

	public function years(){
		return $this->db->select('YEAR(fecha) as year')
				->group_by('year')
				->order_by('year','desc')
				->get('venta')
				->result();
	}

	public function montos($year){
		return $this->db->select('month(fecha) mes , sum(total) as monto')
						->where('fecha >=',$year.'-01-01')
						->where('fecha <=',$year.'-12-31')
						->group_by('mes')
						->order_by('mes')
						->get('venta')
						->result();
	}

}
 ?>