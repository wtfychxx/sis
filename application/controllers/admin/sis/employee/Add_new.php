<?php

class Add_new extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('M_login', 'login');
        $this->load->model('M_home');
        $this->login->session_check();

    }

    public function index(){

        $data['content'] = 'admin/sis/employee/v_add_new';
        $data['breadcrumb'] = '<b> Add New </b>';
        $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

        $this->template->display('admin/partials/template', $data);
    }
}

?>