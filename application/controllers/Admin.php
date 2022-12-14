<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_cpanel');
		$this->load->model('model_database', 'dbs', TRUE);
    }
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///yang general bosque////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function dashboard (){
		$data['title']='Dashboard';
		$data['or']=$this->dbs->allOprec()->result();	
		$data['content']='admin/index';			
		$this->load->view('xrossbone/index',$data);
	}
	public function news(){
		$data['title']='News';
		$data['or']=$this->dbs->allOprec()->result();	
		$data['n']=$this->dbs->allNews()->result();	
		$data['content']='admin/news';			
		$this->load->view('xrossbone/index',$data);
	}
	function requestNews() {
		date_default_timezone_set('Asia/Jakarta');
		$dat= array(
			'news_title' =>  $this->input->post('title'),
			'news_content' =>  $this->input->post('cont'),
			'date'=>date("Y-m-d H:i:s",time())
		);
		$this->dbs->requestNews($dat);
		redirect('admin/news', 'refresh');
	}
	function deleteNews($id){
		$this->dbs->deleteNews($id);
		redirect('admin/news','refresh');
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////Khusus oprec ajah/////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function oprec (){
		$level=$this->session->userdata('lv');
		$user=$this->session->userdata('id_user');
		if($level==4){
			$q = $this->dbs->getLabLevel($user)->row();			
			$data['title']='Open Recruitment';
			$data['content']='admin/recruitment/oprec';		
			$data['lab']=$this->dbs->getLab($q->id_lab)->result();	
			$this->load->view('xrossbone/index',$data);
		}else{
			$data['title']='Open Recruitment';
			$data['content']='admin/recruitment/oprec';		
			$data['ay']=$this->dbs->allAcademicYear()->result();
			$data['or']=$this->dbs->allOprec()->result();
			$data['lab']=$this->dbs->allLab()->result();	
			$data['lw']=$this->dbs->allLabwork()->result();	
			$this->load->view('xrossbone/index',$data);
		}
	}
	public function oprecDetail($id){
		$t = $this->dbs->getLabLevel($this->session->userdata('id_user'))->row();
			$data['title']='Open Recruitment';
			$data['content']='admin/recruitment/oprecDetail';
			$data['l']=$this->dbs->getLab($t->id_lab)->row();				
			$data['o']=$this->dbs->getOprec($id)->row();				
			$data['n']=$this->dbs->getCandidate1($id,$t->id_lab)->num_rows();				
			$data['g']=$this->dbs->getCandidate1($id,$t->id_lab)->result();				
			$data['lab']=$this->dbs->allLab()->result();	
			$this->load->view('xrossbone/index',$data);
	}
	function requestOprec() {
		$kode = $this->input->post('nim');
		$lw=$this->input->post('lw');
		$dat= array(
			'id_ay' =>  $this->input->post('ay'),
			'id_labwork' =>  $lw,
			'start_date' =>  $this->input->post('ds'),
			'end_date' =>  $this->input->post('de'),
			'description' =>  $this->input->post('desc'),

		);
		$this->dbs->requestOprec($dat);
		$id=$this->db->insert_id();
		$q = $this->dbs->getLabworkByID($lw)->result();
		foreach($q as $l){
			$dat1= array(
				'id_oprec' =>  $id,
				'id_lab' =>  $l->id_lab,
			);
			$this->dbs->requestOprecD($dat1);
	}
		redirect('admin/oprec', 'refresh');
	}

	public function allOprec (){
		$level=$this->session->userdata('lv');
		$user=$this->session->userdata('id_user');
		$data['title']='Open Recruitment';
		$data['content']='admin/recruitment/allOprec';		
		$data['ay']=$this->dbs->allAcademicYear()->result();
		$data['or']=$this->dbs->allViewOprec()->result();
		$this->load->view('xrossbone/index',$data);
	}

	public function oprecDetailAdm($id,$id_lab){
			$data['title']='Open Recruitment';
			$data['content']='admin/recruitment/oprecDetail';
			$data['l']=$this->dbs->getLab($id_lab)->row();				
			$data['o']=$this->dbs->getOprec($id)->row();				
			$data['n']=$this->dbs->getCandidate1($id,$id_lab)->num_rows();				
			$data['g']=$this->dbs->getCandidate1($id,$id_lab)->result();				
			$data['lab']=$this->dbs->allLab()->result();	
			$this->load->view('xrossbone/index',$data);
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
}
