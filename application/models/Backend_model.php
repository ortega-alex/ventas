<?php 
/**
* 
*/
class Backend_model extends CI_Model{
	
	public function getId($link){
		return $this->db->like('link',$link)
				 ->get('menus')
				 ->row();

	}	

	public function getPermisos($menu,$rol){
		return $this->db->where('menu_id',$menu)
						->where('rol_id',$rol)
						->get('permisos')
						->row();
	}
}

?>