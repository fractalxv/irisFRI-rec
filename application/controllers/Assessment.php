<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends CI_Controller {

	function __construct(){
    parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_cpanel');
		$this->load->model('model_database', 'dbs', TRUE);
    }

    public function setup(){
        $lv=$this->session->userdata('lv');
		switch($lv){
            case 1://Super Admin
				$data['title']='Dashboard';
				$data['or']=$this->dbs->allOprec()->result();	
				$data['content']='admin/indexAdmin';
                break;
            case 4://pic lab
				$t = $this->dbs->getLabLevel($this->session->userdata('id_user'))->row();
				$data['title']='Assesment Setup';
				$data['or']=$this->dbs->getOprecByLab($t->id_lab)->result();	
				$data['lab']=$this->dbs->getLab($t->id_lab)->row();	
				$data['content']='admin/assessment/indexPIC';	
				break;
			default:
				$data['title']='Dashboard';
				$data['or']=$this->dbs->allOprec()->result();	
				$data['content']='admin/index';
        }
        $this->load->view('xrossbone/index',$data);
    }

    function assessmentDetail($idoprec){
		$t = $this->dbs->getLabLevel($this->session->userdata('id_user'))->row();
		$q = $this->dbs->sumWeight($idoprec,$t->id_lab)->row();
		$data['title']='Assessment Setup';
		$data['idoprec']=$idoprec;	
		$data['w']=$q->total;	
		$data['as']=$this->dbs->getAsByLab($idoprec,$t->id_lab)->result();
		$data['content']='admin/assessment/asDetail';
		$this->load->view('xrossbone/index',$data);
	}
	function requestAs() {
		date_default_timezone_set('Asia/Jakarta');
		$t = $this->dbs->getLabLevel($this->session->userdata('id_user'))->row();
		$id=$this->input->post('id');
		$dat= array(
			'id_oprec' => $id ,
			'id_lab' =>  $t->id_lab,
			'as_name' =>  $this->input->post('an'),
			'pass_score' =>  $this->input->post('sc'),
			'as_desc' =>  $this->input->post('desc'),
			'as_weight' =>  $this->input->post('w'),
			'as_order' =>  $this->input->post('or'),
			'as_date'=>$this->input->post('ds')
		);
		$this->dbs->requestAs($dat);
		redirect('assessment/assessmentDetail/'.$id, 'refresh');
	}

	function deleteAs($id,$as){
		$this->dbs->deleteAs($as);
		redirect('assessment/assessmentDetail/'.$id,'refresh');
	}

	function editAssessment($id){
		$data['idas']=$id;
		$data['q']=$this->dbs->getAsD($id)->row();
		$this->load->view('admin/assessment/editAs',$data);
	}

	function requestEditAs() {
		$ido=$this->input->post('ido');
		$id=$this->input->post('id');
		$dat= array(
			'as_name' =>  $this->input->post('an'),
			'pass_score' =>  $this->input->post('sc'),
			'as_desc' =>  $this->input->post('desc'),
			'as_weight' =>  $this->input->post('w'),
			'as_order' =>  $this->input->post('or'),
			'as_date'=>$this->input->post('ds')
		);
		$this->dbs->requestUpdateAs($dat,$id);
		redirect('asessment/assessmentDetail/'.$ido, 'refresh');
    }
    
    function assess(){
        $lv=$this->session->userdata('lv');
		switch($lv){
            case 1://Super Admin
				$data['title']='Dashboard';
				$data['or']=$this->dbs->allOprec()->result();	
				$data['content']='admin/indexAdmin';
                break;
            case 4://pic lab
				$t = $this->dbs->getLabLevel($this->session->userdata('id_user'))->row();
				$data['title']='Assesment';
				$data['or']=$this->dbs->getOprecByLab($t->id_lab)->result();	
				$data['lab']=$this->dbs->getLab($t->id_lab)->row();	
				$data['ap']=$this->dbs->getAssByLab($t->id_lab)->result();
				$data['content']='admin/assessment/asPIC';	
				break;
			default:
				$data['title']='Dashboard';
				$data['or']=$this->dbs->allOprec()->result();	
				$data['content']='admin/index';
        }
        $this->load->view('xrossbone/index',$data);
    }
    function getChainAs(){
        //$id = $this->input->post('id');
        $ido = '6';
        $idl = '10';
        $q=$this->dbs->getAsByLab($ido,$idl)->result();
        $lists = "<option value=''>Pilih</option>";
        foreach($q as $d){
            $lists .= "<option value='".$d->id_as."'>".$d->as_name."</option>"; // Tambahkan tag option ke variabel $lists
        }
        $callback = array('lis'=>$lists);
        echo json_encode($callback);
    }

    function reqAssess(){
        $rec=$this->input->post('r');
        $as=$this->input->post('ap');
        $lv=$this->session->userdata('lv');
		switch($lv){
            case 1://Super Admin
				$data['title']='Dashboard';
				$data['or']=$this->dbs->allOprec()->result();	
				$data['content']='admin/indexAdmin';
                break;
            case 4://pic lab
				$t = $this->dbs->getLabLevel($this->session->userdata('id_user'))->row();
				$data['title']='Assess Candidate';
				$data['or']=$this->dbs->getOprecByLab($t->id_lab)->result();	
				$data['r']=$this->dbs->getOprecByID($rec)->row();	
				$data['as']=$this->dbs->getAsD($as)->row();	
				$data['ap']=$as;	
                $data['lab']=$this->dbs->getLab($t->id_lab)->row();	
                //$data['sc']=$this->dbs->viewASR1($as,$t->id_lab)->row();	
                $data['g']=$this->dbs->getCandidateByLab($t->id_lab)->result();	
				$data['content']='admin/assessment/asNow';	
				break;
			default:
				$data['title']='Dashboard';
				$data['or']=$this->dbs->allOprec()->result();	
				$data['content']='admin/index';
        }
        $this->load->view('xrossbone/index',$data);
    }
    function reqPushAs(){
        $nim=$this->input->post('nim');
		$temp= count($nim);
        $sc=$this->input->post('sc');
        $as=$this->input->post('as');
        for ($i=0;$i<$temp;$i++){
                $dat= array(
                    'id_as' =>  $as,
                    'nim' =>  $nim[$i],
                    'score' =>  $sc[$i]
                );
				$this->dbs->requestPushAs($dat);
            }
		redirect('assessment/assess', 'refresh');
    }

}