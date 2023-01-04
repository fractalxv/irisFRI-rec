<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_database extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////General////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function getAY($id)
	{
		$this->db
			->from('academic_year')
			->where('id_ay', $id);
		$query = $this->db->get();
		return $query;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////OPREC MASTER////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function viewOprecMaster()
	{
		$this->db
			->from('view_oprec_master');
		$query = $this->db->get();
		return $query;
	}
	function viewOprec()
	{
		$this->db
			->from('view_oprec');
		$query = $this->db->get();
		return $query;
	}
	function getViewOprec($id)
	{
		$this->db
			->from('view_oprec')
			->where('id_oprec', $id);
		$query = $this->db->get();
		return $query;
	}
	function requestOprec($data)
	{
		$this->db->insert('oprec', $data);
	}
	function requestOprecD($data)
	{
		$this->db->insert('oprec_detail', $data);
	}
	function allOprec()
	{
		$this->db
			->from('oprec');
		$query = $this->db->get();
		return $query;
	}
	function allViewOprec()
	{
		$this->db
			->from('view_oprec');
		$query = $this->db->get();
		return $query;
	}
	function getOprec($id)
	{
		$this->db
			->from('oprec')
			->where('id_oprec', $id);
		$query = $this->db->get();
		return $query;
	}

	function getOprecByLab($id)
	{
		$this->db
			->from('view_oprec')
			->where('id_lab', $id);
		$query = $this->db->get();
		return $query;
	}
	function getOprecByID($id)
	{
		$this->db
			->from('view_oprec')
			->where('id_oprec', $id);
		$query = $this->db->get();
		return $query;
	}

	function allOG()
	{
		$this->db
			->from('view_og');
		$query = $this->db->get();
		return $query;
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function allLabwork()
	{
		$this->db
			->from('view_labwork');
		$query = $this->db->get();
		return $query;
	}
	function viewLabwork()
	{
		$this->db
			->from('view_labwork');
		$query = $this->db->get();
		return $query;
	}
	function getLabworkByID($id)
	{
		$this->db
			->from('view_labwork')
			->where('id_labwork', $id);
		$query = $this->db->get();
		return $query;
	}
	function getLabworkByLab($id)
	{
		$this->db
			->from('view_labwork')
			->where('id_lab', $id);
		$query = $this->db->get();
		return $query;
	}
	function allMajor()
	{
		$this->db
			->from('major');
		$query = $this->db->get();
		return $query;
	}
	function allMahasiswa()
	{
		$this->db
			->from('student');
		$query = $this->db->get();
		return $query;
	}
	function allNews()
	{
		$this->db
			->from('news');
		$query = $this->db->get();
		return $query;
	}

	function allAcademicYear()
	{
		$this->db
			->from('academic_year');
		$query = $this->db->get();
		return $query;
	}
	function getMhs($cd)
	{
		$this->db
			->from('student')
			->like('nim', $cd);
		$query = $this->db->get();
		return $query;
	}
	function getMhs2($cd)
	{
		$this->db
			->from('student')
			->where('nim', $cd);
		$query = $this->db->get();
		return $query;
	}
	function requestNews($data)
	{
		$this->db->insert('news', $data);
	}
	function requestEntryReg($data)
	{
		$this->db->insert('candidate', $data);
	}
	function requestEntryAccount($data)
	{
		$this->db->insert('system_user', $data);
	}
	function allLab()
	{
		$this->db
			->from('laboratory');
		$query = $this->db->get();
		return $query;
	}
	function getLabLevel($user)
	{
		$this->db
			->from('system_user_lab')
			->where('id_user', $user);
		$query = $this->db->get();
		return $query;
	}
	function getLab($lab)
	{
		$this->db
			->from('laboratory')
			->where('id_lab', $lab);
		$query = $this->db->get();
		return $query;
	}

	function getNews()
	{
		$this->db
			->from('news');
		$query = $this->db->get();
		return $query;
	}

	function getCandidate1($ido, $idl)
	{
		$this->db
			->from('view_candidate')
			->where('id_oprec', $ido)
			->where('id_lab', $idl);
		$query = $this->db->get();
		return $query;
	}
	function getCandidateByLab($idlab)
	{
		$this->db
			->from('view_candidate')
			->where('id_lab', $idlab);
		$query = $this->db->get();
		return $query;
	}

	function getCandidateByOG($idog)
	{
		$this->db
			->from('view_candidate')
			->where('id_oprec', $idog);
		$query = $this->db->get();
		return $query;
	}
	function getCandidate($nim)
	{
		$this->db
			->from('view_candidate')
			->where('nim', $nim);
		$query = $this->db->get();
		return $query;
	}
	function getCandidateByNIM($nim)
	{
		$this->db
			->from('candidate')
			->join('student', 'student.nim=candidate.nim')
			->where('candidate.nim', $nim);
		$query = $this->db->get();
		return $query;
	}
	function checkOG($idoprec, $nim)
	{
		$this->db
			->from('oprec_general')
			->where('id_oprec', $idoprec)
			->where('nim', $nim);
		$query = $this->db->get();
		return $query;
	}
	function getOG($idoprec)
	{
		$this->db
			->from('view_og')
			->where('id_oprec', $idoprec);
		$query = $this->db->get();
		return $query;
	}

	function getMaxOG($idoprec)
	{
		$this->db
			->select_max('id_oprec_gen')
			->from('view_og')
			->where('id_oprec', $idoprec);
		$query = $this->db->get();
		return $query;
	}
	function getOGByOG($idog)
	{
		$this->db
			->from('view_og')
			->where('id_oprec_gen', $idog);
		$query = $this->db->get();
		return $query;
	}
	function getOGByNIM($idoprec)
	{
		$this->db
			->from('view_og')
			->where('nim', $idoprec);
		$query = $this->db->get();
		return $query;
	}
	function requestStep1($data)
	{
		$this->db->insert('oprec_general', $data);
	}
	function requestUpdateStep1($data, $id)
	{
		$this->db->update('oprec_general', $data, array('id_oprec_gen' => $id));
	}
	function requestStep2($data)
	{
		$this->db->insert('oprec_education', $data);
	}
	function getOprecEdu($idog)
	{
		$this->db
			->from('oprec_education')
			->where('id_oprec_gen', $idog)
			->order_by('year', 'asc');
		$query = $this->db->get();
		return $query;
	}
	function getOprecOrg($idog)
	{
		$this->db
			->from('oprec_organization')
			->where('id_oprec_gen', $idog)
			->order_by('year', 'asc');
		$query = $this->db->get();
		return $query;
	}
	function requestStep3($data)
	{
		$this->db->insert('oprec_organization', $data);
	}
	function allSoftLvl()
	{
		$this->db
			->from('software_lvl');
		$query = $this->db->get();
		return $query;
	}
	function requestStep4($data)
	{
		$this->db->insert('oprec_skills', $data);
	}
	function getOprecSkills($idog)
	{
		$this->db
			->from('oprec_skills')
			->join('software_lvl', 'oprec_skills.software_lvl=software_lvl.id_sl')
			->where('id_oprec_gen', $idog);
		$query = $this->db->get();
		return $query;
	}
	function requestStep5($data)
	{
		$this->db->insert('oprec_achievement', $data);
	}
	function getOprecAch($idog)
	{
		$this->db
			->from('oprec_achievement')
			->join('achievement_type', 'achievement_type.id_at=oprec_achievement.achievement_type')
			->where('id_oprec_gen', $idog);
		$query = $this->db->get();
		return $query;
	}
	function allAchievementType()
	{
		$this->db
			->from('achievement_type');
		$query = $this->db->get();
		return $query;
	}
	function requestStep6($data)
	{
		$this->db->insert('oprec_file', $data);
	}
	function requestUpdateStep6($data, $id)
	{
		$this->db->update('oprec_file', $data, array('id_oprec_gen' => $id));
	}
	function getOprecFile($idog)
	{
		$this->db
			->from('oprec_file')
			->where('id_oprec_gen', $idog);
		$query = $this->db->get();
		return $query;
	}
	function deleteEnroll($id)
	{
		$this->db->delete('oprec', array('id_oprec' => $id));
	}
	function deleteOprecEdu($id)
	{
		$this->db->delete('oprec_education', array('id_oprec_edu' => $id));
	}
	function deleteOprecOrg($id)
	{
		$this->db->delete('oprec_organization', array('id_oprec_org' => $id));
	}
	function deleteOprecSkills($id)
	{
		$this->db->delete('oprec_skills', array('id_oprec_skills' => $id));
	}
	function deleteOprecAch($id)
	{
		$this->db->delete('oprec_achievement', array('id_oprec_achievement' => $id));
	}
	function deleteNews($id)
	{
		$this->db->delete('news', array('id_news' => $id));
	}

	function deleteOG($idog)
	{
		$this->db->delete('oprec_general', array('id_oprec_gen' => $idog));
	}
	function deleteOGEdu($idog)
	{
		$this->db->delete('oprec_education', array('id_oprec_gen' => $idog));
	}
	function deleteOGOrg($idog)
	{
		$this->db->delete('oprec_organization', array('id_oprec_gen' => $idog));
	}
	function deleteOGSkills($idog)
	{
		$this->db->delete('oprec_skills', array('id_oprec_gen' => $idog));
	}
	function deleteOGAch($idog)
	{
		$this->db->delete('oprec_achievement', array('id_oprec_gen' => $idog));
	}
	function deleteOGFile($idog)
	{
		$this->db->delete('oprec_file', array('id_oprec_gen' => $idog));
	}
	function deleteCandidate($nim)
	{
		$this->db->delete('candidate', array('nim' => $nim));
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////The Assesment Bitch/////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function allAs()
	{
		$this->db
			->from('assessment');
		$query = $this->db->get();
		return $query;
	}
	function viewASR1($id, $idl)
	{
		$this->db
			->from('view_asr')
			->where('id_as', $id)
			->where('id_lab', $idl);
		$query = $this->db->get();
		return $query;
	}
	function viewASR2($id, $idl, $nim)
	{
		$this->db
			->from('view_asr')
			->where('id_as', $id)
			->where('id_lab', $idl)
			->where('nim', $nim);
		$query = $this->db->get();
		return $query;
	}
	function getAsByLab($ido, $idl)
	{
		$this->db
			->from('assessment')
			->where('id_oprec', $ido)
			->where('id_lab', $idl);
		$query = $this->db->get();
		return $query;
	}
	function getAsByLab2($ido)
	{
		$this->db
			->from('assessment')
			->where('id_oprec', $ido);
		$query = $this->db->get();
		return $query;
	}
	function getAssByLab($idl)
	{
		$this->db
			->from('assessment')
			->where('id_lab', $idl);
		$query = $this->db->get();
		return $query;
	}
	function getAsD($id)
	{
		$this->db
			->from('assessment')
			->where('id_as', $id);
		$query = $this->db->get();
		return $query;
	}
	function requestAs($data)
	{
		$this->db->insert('assessment', $data);
	}
	function deleteAs($id)
	{
		$this->db->delete('assessment', array('id_as' => $id));
	}
	function requestPushAs($data)
	{
		$this->db->insert('assessment_result', $data);
	}
	function requestUpdateAs($data, $id)
	{
		$this->db->update('assessment', $data, array('id_as' => $id));
	}
	function sumWeight($ido, $idl)
	{
		$this->db
			->select('SUM(as_weight) AS total')
			->from('assessment')
			->where('id_oprec', $ido)
			->where('id_lab', $idl);
		$query = $this->db->get();
		return $query;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function getMenu($level)
	{
		$this->db
			->from('system_user_privileges')
			->join('system_menu', 'system_user_privileges.id_pm=system_menu.id_pm')
			->join('system_module', 'system_user_privileges.id_pm=system_module.id_pm')
			->where('system_menu.parent_id', 0)
			//->where('system_module.status',1)
			->where('system_user_privileges.id_level', $level)
			->order_by('menu_order');
		$query = $this->db->get();
		return $query;
	}
	function getChildMenu($id)
	{
		$this->db
			->from('system_menu')
			->where('parent_id', $id)
			->order_by('menu_order');
		$query = $this->db->get();
		return $query;
	}

	function getYear()
	{
		$this->db
			->from('academic_year');
		$query = $this->db->get();
		return $query;
	}
	function requestAddYear($data)
	{
		$this->db->insert('academic_year', $data);
	}

	function deleteYear($id_ay)
	{
		$this->db->delete('academic_year', array('id_ay' => $id_ay));
	}
}
