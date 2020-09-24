<?php

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('M_login');
    }

    public function index(){
        $this->load->view('admin/login.php');
    }

    public function ajx_check(){
    	header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST');
		header('Access-Control-Allow-Headers: X-Requested-With');
		if($this->input->is_ajax_request()){
			if($this->M_login->check('db', strtoupper($this->input->post('txtinput[70]', TRUE)), $this->input->post('txtinput[71]', TRUE), 'sis')){
				$return_value = array
								(
									'js_action_insert',
									array('Successfully Logged In!', 'ok')
								);
			}else{
				$return_value = array
								(
									'js_action_message',
									array('Incorrect username or password', 'error')
								);
			}

			$return_value = json_encode($return_value);

			echo $return_value;
		}
    }
}

?>