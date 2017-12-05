<?php 

/**
* 
*/
class Ventas extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('login')) {
			redirect(base_url());
		} 
		$this->load->model('Ventas_model');
		$this->load->model('Clientes_model');
		$this->load->model('Productos_model');
	}

	public function index(){
		$data = array(
			"ventas" => $this->Ventas_model->getVentas()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/ventas/list',$data);
		$this->load->view('layouts/footer');	
	}

	public function add(){
		$data = array(
			"tipoComprobantes" => $this->Ventas_model->getComprobantes(),
			"clientes" => $this->Clientes_model->getClientes()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/ventas/add',$data);
		$this->load->view('layouts/footer');	
	}

	public function getProductos(){
		$valor = $this->input->post("valor");
		echo $valor;
		$producto = $this->Ventas_model->getProductos($valor);
		echo json_encode($producto);
	}

	public function store(){
		$fecha = $this->input->post("fecha");
		$subtotal = $this->input->post("subtotal");
		$descuento = $this->input->post("descuento");
		$igv = $this->input->post("igv");
		$total = $this->input->post("total");
		$idcomprobante = $this->input->post("idcomprobante");
		$idcliente = $this->input->post("idcliente");
		$idusuario = $this->session->userdata("id");
		$numero = $this->input->post("numero");
		$serie = $this->input->post("serie");
	
		$idproductos = $this->input->post("idProducto");
		$precio = $this->input->post("precio");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importe");

		$data = array(
				"num_documento" => $numero,
				"fecha" => $fecha,
				"subtotal" => $subtotal,
				"igv" => $igv,
				"descuento" => $descuento,				
				"total" => $total,
				"num_documento" => $numero,
				"serie" => $serie,						
				"cliente" => $idcliente,
				"usuario" => $idusuario,
				"tipo_comprobante" => $idcomprobante		
			);
		if ($this->Ventas_model->save($data)) {
			$idVenta = $this->Ventas_model->lastId();
			$this->updateComprobante($idcomprobante);
			$this->detalleProducto($idproductos,$idVenta,$cantidades,$precio,$importes);

			redirect(base_url()."movimientos/ventas");
		} else {
			redirect(base_url()."movimientos/ventas/add");
		}	
	}

	protected function updateComprobante($idComprobante){
		$comprobanteActual = $this->Ventas_model->getComprobante($idComprobante);
		$data = array(
			"cantidad" => $comprobanteActual->cantidad + 1
		);
		$this->Ventas_model->updateComprobante($idComprobante,$data);
	}

	protected function detalleProducto($idproductos,$idVenta,$cantidades,$precio,$importes){
		for($i = 0; $i < count($idproductos);$i++){
			$data = array(
				"cantidad" => $cantidades[$i],
				"precio" => $precio[$i],
				"importe" => $importes[$i],
				"producto" => $idproductos[$i],
				"venta" => $idVenta
			);
			$this->Ventas_model->saveDetalleVenta($data);
			$this->updateStockProductos($idproductos[$i],$cantidades[$i]);
		}
	}

	protected function updateStockProductos($id,$cantidad){
		$productoActual = $this->Productos_model->getProducto($id);
		$data = array(
			"stock" => $productoActual->stock - $cantidad
		);
		$producto = $this->Productos_model->update($id,$data);
	}

	public function view(){
		$valor = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($valor),
			"detalles" => $this->Ventas_model->getDetalleVenta($valor),
		);
		$this->load->view('admin/ventas/view',$data);
	}

}

 ?>