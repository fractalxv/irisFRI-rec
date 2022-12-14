<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_general extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	function getMenu($level){
		$this->db
		->from('system_user_privileges')
		->join('system_menu','system_user_privileges.id_pm=system_menu.id_pm')
		->join('system_module','system_user_privileges.id_pm=system_module.id_pm')
		->where('system_menu.parent_id',0)
		//->where('system_module.status',1)
		->where('system_user_privileges.id_level',$level)
		->order_by('menu_order');
        $query = $this->db->get();
		return $query;
	}
	function getChildMenu($id){
		$this->db
		->from('system_menu')
		->where('parent_id',$id)
		->order_by('menu_order');
		$query = $this->db->get();
		return $query;
	}
}