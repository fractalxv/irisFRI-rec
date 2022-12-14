<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_cpanel');
		$this->load->model('model_database', 'dbs', TRUE);
	}

	public function enroll()
	{
		$data['title'] = 'Recruitment';
		$data['or'] = $this->dbs->viewOprecMaster()->result();
		$data['content'] = 'recruitment/enroll';
		$this->load->view('xrossbone/index', $data);
	}

	public function applicantDetail($idog)
	{
		$r = $this->dbs->getOGByOG($idog)->row();
		$data['mhs'] = $this->dbs->getCandidate($r->nim)->row();
		$data['r'] = $this->dbs->getOGByOG($idog)->row();
		$data['o'] = $this->dbs->getOprecFile($idog)->row();
		$data['r1'] = $this->dbs->getOprecEdu($idog)->result();
		$data['r2'] = $this->dbs->getOprecOrg($idog)->result();
		$data['r3'] = $this->dbs->getOprecSkills($idog)->result();
		$data['r4'] = $this->dbs->getOprecAch($idog)->result();
		$data['title'] = 'Recruitment';
		//$data['or']=$this->dbs->allOprec()->result();	
		$data['content'] = 'recruitment/applicantDetail';
		$this->load->view('xrossbone/index', $data);
	}

	function deleteApplicant($idog, $idoprec)
	{
		$r = $this->dbs->getOGByOG($idog)->row();
		$this->dbs->deleteOG($idog);
		$this->dbs->deleteOGEdu($idog);
		$this->dbs->deleteOGOrg($idog);
		$this->dbs->deleteOGSkills($idog);
		$this->dbs->deleteOGAch($idog);
		$this->dbs->deleteOGFile($idog);
		redirect('admin/oprecDetail/' . $idoprec, 'refresh');
	}

	public function apply($kode)
	{
		$this->checkRecDate($kode);
		$q = $this->dbs->getOprec($kode)->row();
		$iday = str_pad($q->id_ay, 2, 0, STR_PAD_LEFT);
		$idoprec = str_pad($kode, 2, 0, STR_PAD_LEFT);
		$inc = $this->dbs->getMaxOG($kode)->row();
		$inc2 = substr($inc->id_oprec_gen, -3);
		$num = str_pad($inc2 + 1, 3, 0, STR_PAD_LEFT);
		$kod = 'R' . $idoprec . $iday . $num;
		redirect('recruitment/step1/' . $idoprec . '/' . $kod, 'refresh');
	}
	function deleteEnroll($id)
	{
		$lv = $this->session->userdata('lv');
		if ($lv == 1) {
			$this->dbs->deleteEnroll($id);
			redirect('admin/oprec', 'refresh');
		} else {
			redirect('admin/oprec', 'refresh');
		}
	}

	function step1($id, $kode)
	{
		$c = $this->dbs->getOGByOG($kode)->row();
		$data['title'] = 'Recruitment';
		if ($c != NULL) {
			$data['q'] = $this->dbs->getOGByOG($kode)->row();
			$data['lab'] = $this->dbs->getViewOprec($id)->result();
			$data['m'] = $this->dbs->allMajor()->result();
			$data['content'] = 'recruitment/step1alt';
		} else {
			$data['lab'] = $this->dbs->getViewOprec($id)->result();
			$data['m'] = $this->dbs->allMajor()->result();
			$data['id'] = $id;
			$data['kode'] = $kode;
			$data['content'] = 'recruitment/step1';
		}
		$this->load->view('xrossbone/index', $data);
	}
	public function requestStep1()
	{
		$kode = $this->input->post('kode');
		$id = $this->input->post('id');
		$maj = $this->input->post('maj');
		$nim = $this->session->userdata('username');
		$mot = $this->input->post('motto');
		$gpa = $this->input->post('gpa');
		$motiv = $this->input->post('motiv');
		$l = $this->input->post('lab');
		$dat1 = array(
			'id_oprec_gen' =>  $kode,
			'id_oprec' =>  $id,
			'id_major' =>  $maj,
			'id_lab' =>  $l,
			'nim' =>  $nim,
			'motto' =>  $mot,
			'gpa' =>  $gpa,
			'motivation' =>  $motiv,
		);
		$this->dbs->requestStep1($dat1);
		redirect('recruitment/step2/' . $kode, 'refresh');
	}
	public function requestUpdateStep1()
	{
		$kode = $this->input->post('kode');
		$mot = $this->input->post('motto');
		$gpa = $this->input->post('gpa');
		$motiv = $this->input->post('motiv');
		$dat1 = array(
			'motto' =>  $mot,
			'gpa' =>  $gpa,
			'motivation' =>  $motiv,
		);
		$this->dbs->requestUpdateStep1($dat1, $kode);
		redirect('recruitment/step2/' . $kode, 'refresh');
	}
	public function step2($kode)
	{
		$data['title'] = 'Recruitment';
		$data['kode'] = $kode;
		$data['og'] = $this->dbs->getOprecEdu($kode)->result();
		$data['content'] = 'recruitment/step2';
		$this->load->view('xrossbone/index', $data);
	}
	public function requestStep2()
	{
		$kode = $this->input->post('kode');
		$yr = $this->input->post('year');
		$edu = $this->input->post('edu');
		$dat1 = array(
			'id_oprec_gen' =>  $kode,
			'year' =>  $yr,
			'education' =>  $edu,
		);
		$this->dbs->requestStep2($dat1);
		redirect('recruitment/step2/' . $kode, 'refresh');
	}
	function deleteOprecEdu($id, $kode)
	{
		$this->dbs->deleteOprecEdu($id);
		redirect('recruitment/step2/' . $kode, 'refresh');
	}
	public function step3($kode)
	{
		$data['title'] = 'Recruitment';
		$data['kode'] = $kode;
		$data['q'] = $this->dbs->getOGByOG($kode)->row();
		$data['og'] = $this->dbs->getOprecOrg($kode)->result();
		$data['content'] = 'recruitment/step3';
		$this->load->view('xrossbone/index', $data);
	}
	public function requestStep3()
	{
		$kode = $this->input->post('kode');
		$yr = $this->input->post('year');
		$org = $this->input->post('org');
		$pos = $this->input->post('pos');
		$dat1 = array(
			'id_oprec_gen' =>  $kode,
			'year' =>  $yr,
			'org_name' =>  $org,
			'position' =>  $pos,
		);
		$this->dbs->requestStep3($dat1);
		redirect('recruitment/step3/' . $kode, 'refresh');
	}
	function deleteOprecOrg($id, $kode)
	{
		$this->dbs->deleteOprecOrg($id);
		redirect('recruitment/step3/' . $kode, 'refresh');
	}
	public function step4($kode)
	{
		$data['title'] = 'Recruitment';
		$data['kode'] = $kode;
		$data['og'] = $this->dbs->getOprecSkills($kode)->result();
		$data['s'] = $this->dbs->alLSoftLvl()->result();
		$data['content'] = 'recruitment/step4';
		$this->load->view('xrossbone/index', $data);
	}
	public function requestStep4()
	{
		$kode = $this->input->post('kode');
		$sn = $this->input->post('sname');
		$sl = $this->input->post('slvl');
		$dat1 = array(
			'id_oprec_gen' =>  $kode,
			'software_name' =>  $sn,
			'software_lvl' =>  $sl,
		);
		$this->dbs->requestStep4($dat1);
		redirect('recruitment/step4/' . $kode, 'refresh');
	}
	function deleteOprecSkills($id, $kode)
	{
		$this->dbs->deleteOprecSkills($id);
		redirect('recruitment/step4/' . $kode, 'refresh');
	}
	public function step5($kode)
	{
		$data['title'] = 'Recruitment';
		$data['kode'] = $kode;
		$data['og'] = $this->dbs->getOprecAch($kode)->result();
		$data['s'] = $this->dbs->alLAchievementType()->result();
		$data['content'] = 'recruitment/step5';
		$this->load->view('xrossbone/index', $data);
	}
	public function requestStep5()
	{
		$kode = $this->input->post('kode');
		$an = $this->input->post('aname');
		$at = $this->input->post('at');
		$yr = $this->input->post('ayear');
		$dat1 = array(
			'id_oprec_gen' =>  $kode,
			'achievement_type' =>  $at,
			'achievement_name' =>  $an,
			'year' =>  $yr,
		);
		$this->dbs->requestStep5($dat1);
		redirect('recruitment/step5/' . $kode, 'refresh');
	}
	function deleteOprecAch($id, $kode)
	{
		$this->dbs->deleteOprecAch($id);
		redirect('recruitment/step5/' . $kode, 'refresh');
	}
	public function step6($kode)
	{
		$data['title'] = 'Recruitment';
		$data['kode'] = $kode;
		$data['og'] = $this->dbs->getOprecAch($kode)->result();
		$data['s'] = $this->dbs->alLAchievementType()->result();
		$data['content'] = 'recruitment/step6';
		$this->load->view('xrossbone/index', $data);
	}
	public function requestStep6()
	{
		$kode = $this->input->post('kode');
		$q = $this->dbs->getOprecFile($kode)->row();

		// setting konfigurasi upload
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|rar|zip';
		$config['maxsize'] = '200';
		$config['file_name'] = $kode;
		$config['overwrite'] = 'TRUE';
		// load library upload
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$error = $this->upload->display_errors();
			// menampilkan pesan error
			print_r($error . 'error 1');
		} else {
			$upload_data = $this->upload->data();
			if (!$this->upload->do_upload('khs')) {
				$error = $this->upload->display_errors();
				// menampilkan pesan error
				print_r($error . 'error 2');
			} else {
				$upload_data2 = $this->upload->data();
				if ($q != NULL) {
					$dat = array(
						'id_oprec_gen' =>  $this->input->post('kode'),
						'photo_url' =>  'uploads/' . $upload_data['file_name'],
						'khs_url' =>  'uploads/' . $upload_data2['file_name'],
					);
					$this->dbs->requestUpdateStep6($dat, $kode);
				} else {
					$dat1 = array(
						'id_oprec_gen' =>  $this->input->post('kode'),
						'photo_url' =>  'uploads/' . $upload_data['file_name'],
						'khs_url' =>  'uploads/' . $upload_data2['file_name'],
					);
					$this->dbs->requestStep6($dat1);
				}
				redirect('recruitment/step6/' . $kode, 'refresh');
			}
		}
	}

	public function finish($kode)
	{
		$dat1 = array(
			'oprec_status' =>  '2',
		);
		$this->dbs->requestUpdateStep1($dat1, $kode);
		redirect('main/dashboard', 'refresh');
	}

	public function checkRecDate($id)
	{
		$today = date('Y-m-d');
		$q = $this->dbs->getOprec($id)->row();
		$now = strtotime($today);
		$dead = strtotime($q->end_date);
		if ($now > $dead) {
			redirect('recruitment/errorDate', 'refresh');
		}
	}
	function errorDate()
	{
		$data['page_title'] = "Error : Expired";
		$this->load->view('recruitment/errorDate', $data);
	}
}
