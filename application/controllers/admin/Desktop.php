<?php 

class Desktop extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_login', 'login');
		$this->load->model('M_home');
		
		$this->login->session_check();
	}

	public function index(){
		$data['content'] = 'admin/sis/index';
		$data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));
		$this->template->display('admin/sis/index', $data);
	}

	public function logout(){
		$session_ci = array('login_stat' => FALSE);
		$this->session->set_userdata($session_ci);
		$this->login->session_check('db');
	}
}

?>