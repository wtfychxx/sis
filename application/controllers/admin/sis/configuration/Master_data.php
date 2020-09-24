<?php

class Master_data extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('M_login', 'login');
        $this->load->model('M_home');
        $this->load->model('admin/sis/SIS_M_live_data');

		
        $this->login->session_check();
    }

    public function _remap($method, $parameters = array())
    {

        if (count($parameters) > 0)
        {
            $method = $parameters[0];
            $method_temp = array_shift($parameters);

            call_user_func_array(array($this, $method), $parameters);
        }
        else
        {
            $this->index();
        }
    }

    public function index(){
        $segment = $this->uri->segment_array();
        $last = end($segment);

        switch($last){
            case 'religion':
                $data['breadcrumb'] = '<b> Religion </b>';
                $data['content'] = 'admin/sis/configuration/master_data/v_religion';
                $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

                $this->template->display('admin/sis/index', $data);
            break;

            case 'marital_status':
                $data['breadcrumb'] = '<b> Marital Status </b>';
                $data['content'] = 'admin/sis/configuration/master_data/v_marital_status';
                $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

                $this->template->display('admin/sis/index', $data);
            break;

            case 'book':
                $data['breadcrumb'] = '<b> Book </b>';
                $data['content'] = 'admin/sis/configuration/library/v_book';
                $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

                $this->template->display('admin/sis/index', $data);
            break;

            case 'genre':
                $data['breadcrumb'] = '<b> Genre </b>';
                $data['content'] = 'admin/sis/configuration/library/v_genre';
                $data['isadmin'] = $this->M_home->getUSerAuth($this->session->userdata('user_id'));

                $this->template->display('admin/sis/index', $data);
            break;

            case 'area':
                $data['breadcrumb'] = '<b> Area </b>';
                $data['content'] = 'admin/sis/configuration/master_data/v_area';
                $data['isadmin'] = $this->M_home->getUserAuth($this->session->userdata('user_id'));

                $this->template->display('admin/sis/index', $data);
            break;
        }
    }

    public function ajx_modal_insert(){
        if($this->input->is_ajax_request()){
            $segment = $this->uri->segment(5);
            $id = trim($this->input->post('txtinput70')) == "" ? 0 : $this->input->post('txtinput70');

            $module_table = $this->db->get_where('ci_sis_master_module_table', array('name' => $segment));
            ($module_table->num_rows() > 0) ? $module_table_id = $module_table->row()->id : redirect('admin/desktop');
            

            switch($segment){

                case 'book':
                    $data = array(
                        'number' => $this->input->post('txtinput71'),
                        'title' => $this->input->post('txtinput72'),
                        'author' => $this->input->post('txtinput73'),
                        'genre__id' => $this->input->post('txtinput74'),
                        'release_year' => $this->input->post('txtinput75'),
                        'description' => $this->input->post('txtinput76'),
                        'created_by' => $this->session->userdata('user_id'),
                        'created_date' => date('Y-m-d H:i:s')
                    );

                    if($id == 0){
                        $check_book_number = $this->db->query('select number from ci_sis_library_master_book')->result_array();
                        foreach($check_book_number as $row){
                            if($row['number'] == $this->input->post('txtinput71')){
                                echo json_encode(array('js_form_error', array('Book Number is already exist!', 'error', 'warning'))); exit;
                            }
                        }
                    }

                    $return_value = $this->SIS_M_live_data->insert
                    (
                        'ci_sis_library_master_book',
                        $data,
                        '',
                        $this->input->post('txtinput70'),
                        'form'
                    );

                break;

                default:
                    $data = array(
                        'module_table__id' => $module_table_id,
                        'parent_id' => 0,
                        'reference_id' => null
                    );
                    
                    $return_value = $this->SIS_M_live_data->insert
                    (
                        'ci_sis_master_data',
                        $data,
                        '',
                        $this->input->post('txtinput70'),
                        'modal'
                    );

                    if($return_value[0] == 'js_form_insert'){
                        $data__id = $this->db->query('select * from ci_sis_master_data order by id desc limit 1')->row('id');
                        $data = array(
                            'language__id' => $this->input->post('txtinput71'),
                            'data__id' => $data__id,
                            'name' => $this->input->post('txtinput72'),
                            'description' => $this->input->post('txtinput73')
                        );

                        $return_value = $this->SIS_M_live_data->insert
                        (
                            'ci_sis_master_data_language',
                            $data,
                            '',
                            '',
                            'modal'
                        );

                        $language = '2';
                        if($this->input->post('txtinput71') == 2){
                            $language = '1';
                        }

                        $data = array(
                            'language__id' => $language,
                            'data__id' => $data__id,
                            'name' => $this->input->post('txtinput72'),
                            'description' => $this->input->post('txtinput73')
                        );

                        $this->SIS_M_live_data->insert
                        (
                            'ci_sis_master_data_language',
                            $data,
                            '',
                            '',
                            'modal'
                        );

                        if(!$this->db->affected_rows() > 0){
                            $return_value = array('js_form_error', 'Error when try save data to database!', 'error');
                        }

                    }else{
                        $where = array();
                        trim($this->input->post('txtinput70')) == '' ? $where = '' : $where = array('language__id' => $this->input->post('txtinput71'), 'data__id' => $this->input->post('txtinput70'));
                        $data = array(
                            'language__id' => $this->input->post('txtinput71'),
                            'name' => $this->input->post('txtinput72'),
                            'description' => $this->input->post('txtinput73')
                        );
                        $return_value = $this->SIS_M_live_data->insert
                        (
                            'ci_sis_master_data_language',
                            $data,
                            $where,
                            $this->input->post('txtinput70'),
                            'modal'
                        );
                    }
                break;
                
            }
            echo json_encode($return_value);
        }
    }

    public function ajx_data_put(){
        if($this->input->is_ajax_request()){
            $last = $this->uri->segment(5);

            switch($last){
                case 'book':
                    $return_value = $this->SIS_M_live_data->put('ci_sis_library_master_book', 0);
                break;

                default:
                    $module = $this->db->query("select id from ci_sis_master_module_table where name = '$last'")->row('id');
                    $return_value = $this->SIS_M_live_data->put($module, 0);
                break;
            }

            echo json_encode($return_value);
        }
    }

    public function ajx_modal_data_put($prm_id = '', $prm_language_id = '', $prm_parent = '', $prm_type = ''){
        if($this->input->is_ajax_request()){
            $segment = $this->uri->segment(5);

            switch($segment){
                case 'book':
                    $data = $this->SIS_M_live_data->put('ci_sis_library_master_book', $prm_id);
                break;
                default:
                    $table_id = $this->db->query("select id from ci_sis_master_module_table where name = '$prm_type'")->row('id');
                    $data = $this->SIS_M_live_data->put('ci_sis_master_data_language', '', array('data__id' => $prm_id, 'language__id' => $prm_language_id));
                break;
            }

            echo json_encode($data);
        }
    }

    public function ajx_delete_data($prm_id = ''){
        if($this->input->is_ajax_request()){
            if($prm_id == ''){
                echo json_encode(array('js_form_error', array('Id cannot be empty!', 'error', 'warning'))); exit;
            }

            $segment = $this->uri->segment(5);

            switch($segment){
                case 'book':
                    $return_value = $this->SIS_M_live_data->delete
                    (
                        'ci_sis_library_master_book',
                        $prm_id
                    );
                break;
                default:
                    $get_module_table = $this->db->query("select id from ci_sis_master_module_table where name = '$segment'")->row()->id;
                    $return_value = $this->SIS_M_live_data->delete(
                        $get_module_table,
                        $prm_id
                    );
                break;
            }

            echo json_encode($return_value);

        }
    }

    public function ajx_live_combo_put($prm_type){
        if($this->input->is_ajax_request()){
            switch($prm_type){
                case 'language':
                    $data = $this->SIS_M_live_data->get_combobox('db', 'ci_system_language');
                break;

                case 'genre':
                    $data = $this->SIS_M_live_data->get_combobox('db', 10);
                break;
            }
            
            echo json_encode($data);
            
        }
    }

    public function ajx_live_generate_book_number(){
        if($this->input->is_ajax_request()){
            $today = date('Y-m-d');
            $get_book_number = $this->db->query("select count(number) from ci_sis_library_master_book where to_char(created_date, 'YYYY-MM-DD') = '$today'");

            $number_result = $get_book_number->row()->count;
            $number_result = $number_result + 1;
            $today_number = str_replace('-', '', $today);

            $return_value = 'B'.$today_number.'00'.$number_result;

            echo json_encode($return_value);
        }
    }
}

?>