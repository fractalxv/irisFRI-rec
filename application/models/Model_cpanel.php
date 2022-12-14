<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cpanel extends CI_Model {
	function checkUserLogin($user,$pass){
		$this->db
		->from('system_user')
		->join('system_user_level','system_user_level.id_level=system_user.level')
		->where('username',$user)
		->where('password',$pass);
        $query = $this->db->get();
		return $query;
	}
	function requestUsername($data){
		$this->db->insert('system_user', $data);
	}
	
	function resetUsername() {
		$this->db->delete('system_user', array('level'=>'9'));
	}
	function allLevel(){
		$this->db
		->from('system_user_level');
        $query = $this->db->get();
		return $query;
	}
	function getLevel($id){
		$this->db
		->from('system_user_level')
		->where('id_level',$id);
        $query = $this->db->get();
		return $query;
	}
	function allModule(){
		$this->db
		->from('system_module');
        $query = $this->db->get();
		return $query;
	}
	function allAccount(){
		$this->db
		->from('system_user')
		->join('system_user_level','system_user_level.id_level=system_user.level');
        $query = $this->db->get();
		return $query;
	}
	function getAccount($id){
		$this->db
		->from('system_user')
		->join('system_user_level','system_user_level.id_level=system_user.level')
		->where('system_user.id_user',$id);
        $query = $this->db->get();
		return $query;
	}
	function updateAccount($data,$id) {
		$this->db->update('system_user',$data,array('id_user'=>$id));
	}
	function deleteAccount($id) {
		$this->db->delete('system_user', array('id_user'=>$id));
	}
	function deleteAccountByNIM($nim) {
		$this->db->delete('system_user', array('username'=>$nim));
	}
	function parentMenu(){
		$this->db
		->from('system_menu')
		->join('system_module','system_module.id_pm=system_menu.id_pm')
		->where('system_menu.parent_id','0');
        $query = $this->db->get();
		return $query;
	}
	function childMenu($id){
		$this->db
		->from('system_menu')
		->join('system_module','system_module.id_pm=system_menu.id_pm')
		->where('system_menu.parent_id',$id);
        $query = $this->db->get();
		return $query;
	}
	function getMenu($id){
		$this->db
		->from('system_menu')
		->join('system_module','system_module.id_pm=system_menu.id_pm')
		->where('system_menu.id',$id);
        $query = $this->db->get();
		return $query;
	}
	function requestMenu($data){
		$this->db->insert('system_menu', $data);
	}
	function updateMenu($data,$id) {
		$this->db->update('system_menu',$data,array('id'=>$id));
	}
	function deleteMenu($id) {
		$this->db->delete('system_menu', array('id'=>$id));
	}
	function getPrivileges($id){
		$this->db
		->from('system_user_privileges')
		->join('system_user_level','system_user_level.id_level=system_user_privileges.id_level')
		->join('system_module','system_module.id_pm=system_user_privileges.id_pm')
		->where('system_user_privileges.id_level',$id);
        $query = $this->db->get();
		return $query;
	}
	function deletePrivileges($id) {
		$this->db->delete('system_user_privileges', array('id_up'=>$id));
	}
	function requestPrivileges($data){
		$this->db->insert('system_user_privileges', $data);
	}
}