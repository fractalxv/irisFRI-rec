<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_cpanel');
		$this->load->model('model_database', 'dbs', TRUE);
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['content'] = 'admin/database/index';
		$this->load->view('xrossbone/index', $data);
	}
	public function goods()
	{
		$data['title'] = 'Database';
		$data['gd'] = $this->dbs->allGoods()->result();
		$data['content'] = 'admin/database/index';
		$this->load->view('xrossbone/index', $data);
	}

	public function addGoods()
	{
		$data['title'] = 'Database';
		$data['gd'] = $this->dbs->allGoods()->result();
		$data['content'] = 'admin/database/addGoods';
		$this->load->view('xrossbone/index', $data);
	}

	public function editGoods($cd)
	{
		$data['title'] = 'Database';
		$data['gd'] = $this->dbs->getGoods($cd)->row();
		$data['content'] = 'admin/database/editGoods';
		$this->load->view('xrossbone/index', $data);
	}
	public function deleteGoods($cd)
	{
		$this->dbs->requestDeleteGoods($dat1);
		redirect('database/entrySuccess', 'refresh');
	}

	function requestEntryGoods()
	{
		$kode = $this->input->post('kode');
		$nbarang = $this->input->post('nbarang');
		$jbarang = $this->input->post('jbarang');
		$dat1 = array(
			'goods_code' =>  $kode,
			'goods_name' =>  $nbarang,
			'goods_qty' =>  $jbarang,
		);
		$this->dbs->requestEntryGoods($dat1);
		redirect('database/entrySuccess', 'refresh');
	}
	function requestEditEntryGoods()
	{
		$kode = $this->input->post('kode');
		$nbarang = $this->input->post('nbarang');
		$jbarang = $this->input->post('jbarang');
		$dat1 = array(
			'goods_name' =>  $nbarang,
			'goods_qty' =>  $jbarang,
		);
		$this->dbs->requestEditEntryGoods($dat1, $kode);
		redirect('database/entrySuccess', 'refresh');
	}

	public function dashboard()
	{
		$data['title'] = 'Dashboard';
		$data['content'] = 'admin/index';
		$this->load->view('xrossbone/index', $data);
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function entrySuccess()
	{
		$this->load->view('admin/entrySuccess');
	}

	public function academic_year()
	{
		$data['title'] = 'Academic Year';
		$data['content'] = 'admin/recruitment/academic_year';
		$data['year'] = $this->dbs->getYear()->result();
		$this->load->view('xrossbone/index', $data);
	}

	function requestYear()
	{
		$semester = $this->input->post('semester');
		$runyear = $this->input->post('runyear');
		$data = array(
			'semester' =>  $semester,
			'run_year' =>  $runyear,
		);
		$this->dbs->requestAddYear($data);
		redirect('database/academic_year', 'refresh');
	}

	function deleteYear($id_ay)
	{
		$this->dbs->deleteYear($id_ay);
		redirect('database/academic_year', 'refresh');
	}
}
