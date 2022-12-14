<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url','email'));
		$this->load->model('model_cpanel');
		$this->load->model('model_database', 'dbs', TRUE);
    }
	
	public function index()
	{
			if($_POST==NULL){
				$data['page_title'] = "Login | Logbook";
				$data['desc'] = "";
				$data['mhs']= $this->dbs->allMahasiswa()->result();
				$this->load->view('system_login/iris_login', $data);
			}
			else{
				
					$user = $this->input->post('textUsername');
					$pass = $this->input->post('textPassword');
					$pass5=md5($pass);
					$q= $this->model_cpanel->checkUserLogin($user,$pass5)->row();
					if ($q->password == $pass5){
						$session_data = array(
							'id_user' => $q->id_user,
							'username' => $q->username,
							'nama' => $q->display_name,
							'lv' => $q->id_level,
							'lvname' => $q->level_name,
							'display' => $q->display_path,
							'is_login' => TRUE
						);
						if($q->id_level==3 || $q->id_level==1|| $q->id_level==4){
							$this->session->set_userdata($session_data);
							redirect('main/dashboard');
						}
						}else{
							redirect('main');
						}
				
			}
		
	}
	
	public function logout() {
		error_reporting(0);
        $data = array
            (
            'id_user' => 0,
			'username' => 0,
			'nama' => 0,
			'level' => 0,
			'display' => 0,
			'is_login' => FALSE
        );
        $this->session->sess_destroy();
        $this->session->unset_userdata($data);
        redirect('main');
		exit();
    }
	
	public function dashboardAdmin (){
		$data['title']='Dashboard';
		$data['content']='admin/index';			
		$this->load->view('xrossbone/index',$data);
	}
	public function dashboard (){
		$lv=$this->session->userdata('lv');
		switch($lv){
			case 1://Super Admin
				$data['title']='Dashboard';
				$data['or']=$this->dbs->allOprec()->result();	
				$data['content']='admin/indexAdmin';
				break;
			case 3://kandidat asisten
				$data['title']='Dashboard';
				$s=$this->session->userdata('username');
				$data['r']=$this->dbs->getCandidateByNIM($s)->row();	
				$data['og']=$this->dbs->getOGByNIM($s)->result();	
				$data['content']='recruitment/index';
				break;
			case 4://pic lab
				$t = $this->dbs->getLabLevel($this->session->userdata('id_user'))->row();
				$data['title']='Dashboard';
				$data['or']=$this->dbs->getOprecByLab($t->id_lab)->result();	
				$data['lab']=$this->dbs->getLab($t->id_lab)->row();	
				$data['content']='admin/indexPIC';	
				break;
			default:
				$data['title']='Dashboard';
				$data['or']=$this->dbs->allOprec()->result();	
				$data['content']='admin/index';	
		}	
		$this->load->view('xrossbone/index',$data);
	}
	
	public function register(){
		$data['title']='Register';
		$data['mhs']=$this->dbs->allMahasiswa()->result();			
		$data['content']='admin/signup/index';			
		$this->load->view('xrossbone/indexRegister',$data);
	}
	
	public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		//$data = $this->db->from('mahasiswa')->like('nim',$keyword)->get();	
		$data = $this->dbs->getMhs($keyword);	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nim,
				'nama'	=>$row->mhs_name
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
	
	function requestRegistration() {
		$kode = $this->input->post('nim');
		$email=$this->input->post('email');
		$pass=$this->input->post('pass');
		$dat1= array(
			'nim' =>  $this->input->post('nim'),
			'alamat' =>  $this->input->post('almt'),
			't_lahir' =>  $this->input->post('tlahir'),
			'tgl_lahir' =>  $this->input->post('tglahir'),
			'email' =>  $email,
			'tlp' =>  $this->input->post('tlp'),

		);
		$this->dbs->requestEntryReg($dat1);
		$nama=$this->dbs->getMhs2($kode)->row();
		$dat2= array(
			'username' =>  $this->input->post('nim'),
			'password' =>  md5($this->input->post('pass')),
			'display_name' =>  $nama->student_name,
			'level' =>  3,
		);
		$this->dbs->requestEntryAccount($dat2);
		/*$htmlContent = '<h2>Thank You For Registration</h2>';
		$htmlContent .= '<p>Your Registration is complete with following details:<br>Username: '.$kode.'<br> Password: '.$pass.'.</p><br>You may now apply for laboratory assistant position.';
		$htmlContent .= '<br><p>Thank You.</p>';
		sendEmail($email,$htmlContent);*/
		redirect('main/success', 'refresh');
	}
	
	public function sendNow(){
		$email='rayindasoesanto91@gmail.com';
		$htmlContent = '<h2>Thank You For Registration</h2>';
		$htmlContent .= '<p>Your Registration is complete with following details:<br>Username: '.$kode.'<br> Password: '.$pass.'.</p><br>You may now apply for laboratory assistant position.';
		$htmlContent .= '<br><p>Thank You.</p>';
		sendEmail($email,$htmlContent);
	}
	
	public function error(){
		$this->load->view('system_login/error');
	}
	public function success(){
		$this->load->view('system_login/success');
	}
}
