<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cpanel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_logged_in();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_cpanel');
	}

	function username()
	{
		$data['title'] = 'Generate Username';
		$data['content'] = 'logbook/generateUsername';
		$this->load->view('xrossbone/index', $data);
	}

	function generateUsername()
	{
		$s = $this->model_logbook->allStudent()->result();
		foreach ($s as $q) {
			$dat = array(
				'username' =>  $q->nim,
				'password' =>  md5($q->nim),
				'display_name' =>  $q->nama_mhs,
				'level' =>  '9',
			);
			$this->model_cpanel->requestUsername($dat);
		}
		redirect('cpanel/account', 'refresh');
	}
	function requestAccount()
	{
		$uname = $this->input->post('uname');
		$pass = $this->input->post('pass');
		$rpass = $this->input->post('rpass');
		$dname = $this->input->post('dname');
		$lv = $this->input->post('lv');
		$dat = array(
			'username' =>  $uname,
			'password' =>  md5($pass),
			'display_name' =>  $dname,
			'level' =>  $lv,
		);
		$this->model_cpanel->requestUsername($dat);
		redirect('cpanel/account', 'refresh');
	}
	function resetUsername()
	{
		$this->model_cpanel->resetUsername();
		redirect('cpanel/account', 'refresh');
	}
	function account()
	{
		$data['acc'] = $this->model_cpanel->allAccount()->result();
		$data['title'] = 'User Account';
		$data['content'] = 'cpanel/account';
		$this->load->view('xrossbone/index', $data);
	}
	function addAccount()
	{
		$data['level'] = $this->model_cpanel->allLevel()->result();
		$data['title'] = 'User Account';
		$data['content'] = 'cpanel/addAccount';
		$this->load->view('xrossbone/index', $data);
	}
	function editAccount($id)
	{
		$data['acc'] = $this->model_cpanel->getAccount($id)->row();
		$data['title'] = 'User Account';
		$data['content'] = 'cpanel/editAccount';
		$this->load->view('xrossbone/index', $data);
	}
	function editMyAccount($id)
	{
		$data['acc'] = $this->model_cpanel->getAccount($id)->row();
		$data['title'] = 'User Account';
		$data['content'] = 'cpanel/editMyAccount';
		$this->load->view('xrossbone/index', $data);
	}
	function updateAccount()
	{
		$id = $this->input->post('id');
		$uname = $this->input->post('uname');
		$pass = $this->input->post('pass');
		$rpass = $this->input->post('rpass');
		$dname = $this->input->post('dname');
		$dat = array(
			'username' =>  $uname,
			'password' =>  md5($pass),
			'display_name' =>  $dname,
		);
		$this->model_cpanel->updateAccount($dat, $id);
		redirect('cpanel/account', 'refresh');
	}
	function updateMyAccount()
	{
		$id = $this->input->post('id');
		$pass = $this->input->post('pass');
		$rpass = $this->input->post('rpass');
		$dat = array(
			'password' =>  md5($pass),
		);
		$this->model_cpanel->updateAccount($dat, $id);
		redirect('main/dashboard', 'refresh');
	}
	function deleteAccount($id)
	{
		$this->model_cpanel->deleteAccount($id);
		redirect('cpanel/account', 'refresh');
	}
	///////////////////////////////////////////////////
	function menu()
	{
		$data['mn'] = $this->model_cpanel->parentMenu()->result();
		$data['title'] = 'Menu';
		$data['content'] = 'cpanel/menu';
		$this->load->view('xrossbone/index', $data);
	}
	function addMenu()
	{
		$data['md'] = $this->model_cpanel->allModule()->result();
		$data['title'] = 'Menu';
		$data['content'] = 'cpanel/addMenu';
		$this->load->view('xrossbone/index', $data);
	}
	function requestMenu()
	{
		$mname = $this->input->post('mname');
		$md = $this->input->post('md');
		$dat = array(
			'menu_name' =>  $mname,
			'id_pm' =>  $md,
			'parent_id' =>  '0',
		);
		$this->model_cpanel->requestMenu($dat);
		redirect('cpanel/menu', 'refresh');
	}
	function editMenu($id)
	{
		$data['mn'] = $this->model_cpanel->getMenu($id)->row();
		$data['md'] = $this->model_cpanel->allModule()->result();
		$data['title'] = 'Menu';
		$data['content'] = 'cpanel/editMenu';
		$this->load->view('xrossbone/index', $data);
	}
	function requestEditMenu()
	{
		$mname = $this->input->post('mname');
		$md = $this->input->post('md');
		$id = $this->input->post('id');
		$dat = array(
			'menu_name' =>  $mname,
			'id_pm' =>  $md,
			'parent_id' =>  '0',
		);
		$this->model_cpanel->updateMenu($dat, $id);
		redirect('cpanel/menu', 'refresh');
	}
	function childDetail($id)
	{
		$data['id'] = $id;
		$data['mn'] = $this->model_cpanel->childMenu($id)->result();
		$data['title'] = 'Menu';
		$data['content'] = 'cpanel/childMenu';
		$this->load->view('xrossbone/index', $data);
	}
	function deleteMenu($id)
	{
		$this->model_cpanel->deleteMenu($id);
		redirect('cpanel/menu', 'refresh');
	}
	function addChildMenu()
	{
		$id = $this->input->post('id');
		$data['id'] = $this->model_cpanel->getMenu($id)->row();
		$data['md'] = $this->model_cpanel->allModule()->result();
		$data['title'] = 'Menu';
		$data['content'] = 'cpanel/addChildMenu';
		$this->load->view('xrossbone/index', $data);
	}
	function requestChildMenu()
	{
		$mname = $this->input->post('mname');
		$md = $this->input->post('md');
		$id = $this->input->post('id');
		$url = $this->input->post('url');
		$dat = array(
			'menu_name' =>  $mname,
			'id_pm' =>  $md,
			'parent_id' =>  $id,
			'url' =>  $url,
		);
		$this->model_cpanel->requestMenu($dat);
		redirect('cpanel/menu', 'refresh');
	}
	function editChildMenu($id, $parent)
	{
		$data['pmn'] = $this->model_cpanel->getMenu($parent)->row();
		$data['mn'] = $this->model_cpanel->getMenu($id)->row();
		$data['md'] = $this->model_cpanel->allModule()->result();
		$data['title'] = 'Menu';
		$data['content'] = 'cpanel/editChildMenu';
		$this->load->view('xrossbone/index', $data);
	}
	function requestEditChildMenu()
	{
		$mname = $this->input->post('mname');
		$md = $this->input->post('md');
		$pid = $this->input->post('pid');
		$id = $this->input->post('id');
		$url = $this->input->post('url');
		$dat = array(
			'menu_name' =>  $mname,
			'id_pm' =>  $md,
			'parent_id' =>  $pid,
			'url' =>  $url,
		);
		$this->model_cpanel->updateMenu($dat, $id);
		redirect('cpanel/childDetail/' . $pid, 'refresh');
	}
	///////////////////////////////////////////////////////
	function access()
	{
		$data['mn'] = $this->model_cpanel->allLevel()->result();
		$data['title'] = 'Hak Akses';
		$data['content'] = 'cpanel/access';
		$this->load->view('xrossbone/index', $data);
	}
	function detailLevel($id)
	{
		$data['id'] = $this->model_cpanel->getLevel($id)->row();
		$data['mn'] = $this->model_cpanel->getPrivileges($id)->result();
		$data['md'] = $this->model_cpanel->allModule()->result();
		$data['title'] = 'Menu';
		$data['content'] = 'cpanel/privileges';
		$this->load->view('xrossbone/index', $data);
	}
	function deletePrivileges($id)
	{
		$this->model_cpanel->deletePrivileges($id);
		redirect('cpanel/access', 'refresh');
	}
	function requestPrivileges()
	{
		$id = $this->input->post('id');
		$pv = $this->input->post('pv');
		$dat = array(
			'id_level' =>  $id,
			'id_pm' =>  $pv,
		);
		$this->model_cpanel->requestPrivileges($dat);
		redirect('cpanel/detailLevel/' . $id, 'refresh');
	}

	function academic_year()
	{
		$id = $this->input->post('id');
		$pv = $this->input->post('pv');
		$dat = array(
			'id_level' =>  $id,
			'id_pm' =>  $pv,
		);
		$this->model_cpanel->requestPrivileges($dat);
		redirect('cpanel/detailLevel/' . $id, 'refresh');
	}
}
