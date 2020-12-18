<?php

class Setup extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('M_login', 'login');
        $this->load->model('M_home');
        $this->load->model('admin/sis/SIS_M_live_data');


        $this->login->session_check();
    }

    public function index(){
        $data['breadcrumb'] = '<b> Group Setup </b>';
        $data['content'] = 'admin/sis/configuration/authorization/group/v_setup';
        $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

        $this->template->display('admin/sis/index', $data);
    }
}

?>