<?php 
/**
* 
*/
class Permisos_model extends CI_Model{
	
	public function getPermisos(){
		return $this->db->select('a.* , b.nombre as rol, c.nombre as menu')
						->from('permisos a')
						->join('roles b','a.rol_id = b.rol')
						->join('menus c','a.menu_id = c.menu')
						->get()
						->result();
	}

	public function getMenus(){
		return $this->db->get('menus')
						->result();
	}

	public function save($data){
		return $this->db->insert("permisos",$data);
	}

	public function getPermiso($id){
		return $this->db->select('a.* , b.nombre as rol, c.nombre as menu')
						->from('permisos a')
						->join('roles b','a.rol_id = b.rol')
						->join('menus c','a.menu_id = c.menu')
						->where('a.permiso',$id)
						->get()
						->row();
	}

	public function update($id,$data){
		$this->db->where('permiso',$id)
					->update('permisos',$data);
		return true;
	}
}
 
?>