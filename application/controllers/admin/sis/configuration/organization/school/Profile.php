<?php

class Profile extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('M_login', 'login');
        $this->load->model('M_home');
        $this->load->model('admin/sis/SIS_M_live_data');


        $this->login->session_check();
    }

    public function index(){
        $data['breadcrumb'] = '<b> Profile </b>';
        $data['content'] = 'admin/sis/configuration/organization/v_school_profile';
        $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

        $this->template->display('admin/sis/index', $data);
    }

    public function form($prm_id = ''){
        $data['breadcrumb'] = '<b> Profile Form </b> ';
        $data['content'] = 'admin/sis/configuration/organization/v_school_profile_form';
        $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

        $this->template->display('admin/sis/index', $data);
    }
}

?>