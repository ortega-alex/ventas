<?php 

class Backend_lib {

	private $CI;
	public function __construct (){
		$this->CI = & get_instance();

	}

	public function control(){
		if(!$this->CI->session->userdata("login")){
			redirect(base_url());
		}
		
		$url = $this->CI->uri->segment(1);
		
		if($this->CI->uri->segment(2)){
			$urk = $this->CI->uri->segment(1).'/'.$this->CI->uri->segment(2);
		}

		$infoMenu = $this->CI->Backend_model->getId($url);
		$permisos = $this->CI->Backend_model->getPermisos($infoMenu->menu,$this->CI->session->userdata('rol'));
		if($permisos->read == 0){
			redirect(base_url()."dashboard");
		}else{
			return $permisos;
		}
	}

}

 ?>