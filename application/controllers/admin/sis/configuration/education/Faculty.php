<?php

class Faculty extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model(array('M_login', 'M_home', 'admin/sis/SIS_M_live_data'));

        $this->M_login->session_check();

    }

    public function index(){
        $data['breadcrumb'] = '<b> Faculty </b>';
        $data['content'] = 'admin/sis/configuration/education/v_faculty';
        $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

        $this->template->display('admin/sis/index', $data);
    }
}

?>