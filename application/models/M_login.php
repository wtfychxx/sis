<?php 

class M_login extends CI_Model{
	function _logout($prm_dbase = 'db', $prm_action_note = 'logout'){
		// $this->M_log->write('db', $prm_action_note);

		$this->session->sess_destroy();
	}

	function check($prm_dbase = 'db', $prm_user_id = '', $prm_password = '', $prm_module = ''){
		$db = $this->{$prm_dbase};

		$prm_module = 'ci_sis';
		$query_alias_user = $db->get_where($prm_module.'_user_data', array('alias_user_id' => $prm_user_id), 1);
		if($query_alias_user->num_rows() > 0){
			$prm_user_id = $query_alias_user->row()->system_user__id;
		}else{
			return FALSE;
			exit;
		}

		$db->select('a.id as user_id, a.name as user_name, a.menu_module_use as menu_module_use, b.id as lang_id, b.name as lang_name, b.abbreviation as lang_abbr')
			->from('ci_system_user a')
			->join('ci_system_language b', 'a.language__id = b.id')
			->where(array('a.id' => $prm_user_id, 'pass' => md5($prm_password)))
			->limit(1);

		$query_sis_user = $db->get();
		if($query_sis_user->num_rows() > 0){
			$session_sis = array(
				'login_stat' => TRUE,
				'user_id' => htmlentities($query_sis_user->row()->user_id),
				'user_name' => htmlentities($query_sis_user->row()->user_name),
				'user_menu_modul_use' => htmlentities($query_sis_user->row()->menu_module_use),
				'user_language_id' => htmlentities($query_sis_user->row()->lang_id),
				'user_language_name' => htmlentities($query_sis_user->row()->lang_name),
				'user_language_abbr' => htmlentities($query_sis_user->row()->lang_abbr)
			);

			$this->session->set_userdata($session_sis);
		}

		// $this->M_log->write($prm_dbase, 'login');

		$return_value = TRUE;

		// if($prm_module != 'system'){
		// 	switch($prm_module){
		// 		case 'sis':
		// 			$db->select('(select name_first from ci_sis_employee_data where id = data__id) as name_first,
		// 				(select gender__id from ci_sis_employee_data where id = data__id) as gender__id,
		// 				data__id, number, join_date_start, sis_employee_company.school__id, ');
		// 		break;
		// 	}
		// }

		return $return_value;
	}

	public function session_check(){
		@session_start();

		if(!$this->session->userdata('login_stat')){
			$this->_logout();

			die ('<span style="font: 9pt Sans, Verdana; font-weight: bold;">Logging Out...</span><script>location.replace("'.site_url('/login').'");</script>');
		}

	}
}

 ?>