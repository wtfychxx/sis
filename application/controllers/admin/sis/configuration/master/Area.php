<?php

class Area extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('M_login', 'login');
        $this->load->model('M_home');
        $this->load->model('admin/sis/SIS_M_live_data');

		
        $this->login->session_check();
    }

    public function index(){
        $data['breadcrumb'] = '<b> Area </b>';
        $data['content'] = 'admin/sis/configuration/master_data/v_area';
        $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

        $this->template->display('admin/sis/index', $data);
    }

    public function ajx_data_put(){
        if($this->input->is_ajax_request()){
            $data = $this->SIS_M_live_data->put('ci_sis_master_area', 0);

            echo json_encode($data);
        }
    }

    public function ajx_modal_insert(){
        if($this->input->is_ajax_request()){
            $data = array(
                'parent_id' => $this->input->post('txtinput71'),
                'name' => $this->input->post('txtinput72'),
                'area_type__id' => $this->input->post('txtinput73'),
                'postcode' => trim($this->input->post('txtinput74')) == '' ? 0 : $this->input->post('txtinput74') 
            );

            $return_value = $this->SIS_M_live_data->insert
            (
                'ci_sis_master_area',
                $data,
                '',
                $this->input->post('txtinput70'),
                'form'
            );

            echo json_encode($return_value);
        }
    }

    public function ajx_modal_data_put($prm_id = ''){
        if($this->input->is_ajax_request()){
            $data = $this->SIS_M_live_data->put('ci_sis_master_area', $prm_id);

            echo json_encode($data);
        }
    }

    public function ajx_delete_data($prm_id = ''){
        if($this->input->is_ajax_request()){
            if(trim($prm_id) == ''){
                echo json_encode(array('js_form_error', array('Id cannot be empty!', 'error', 'warning'))); exit;
            }

            $return_value = $this->SIS_M_live_data->delete
            (
                'ci_sis_master_area',
                $prm_id
            );

            echo json_encode($return_value);
        }
    }

    public function ajx_live_combo_put($prm_type = ''){
        if($this->input->is_ajax_request()){
            switch($prm_type){
                case 'area_all':
                    $data = $this->SIS_M_live_data->get_combobox('db', 'ci_sis_master_area');
                break;

                case 'area_type':
                    $data = $this->SIS_M_live_data->get_combobox('db', 6);
                break;
            }

            echo json_encode($data);
        }
    }
}

?>