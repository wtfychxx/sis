<?php

class SIS_M_live_data extends CI_Model{
    public $structure_parent,
        $structure_non_parent;

        function __construct(){
            parent::__construct();

            $this->structure_parent = array();
            $this->structure_non_parent = array();
        }

        public function combo_fill($prm_dbase = 'db', $prm_module_table = '', $prm_object_start = '', $prm_type = 'NORMAL', $prm_where = array(), $prm_root_show = TRUE, $prm_ajax_returned_value = '', $prm_choose_show = TRUE, $prm_query_special = FALSE, $prm_js_action = 'js_action_combo_item_add', $prm_parent_id = 0){
            switch($prm_type){
                case 'RECURSIVE':
                    $table = array(
                        'NAME' => 'ci_sis_master_data',
                        'PRIMARY' => array('SHOW' => FALSE, 'DATA' => array('id')),
                        'FIELDS' => array('NAME' => array('id', 'name'), 'CAPTION' => 'name', 'ORDER' => 'id',
                        'PARENT_NAME' => 'parent_id'),
                        'ROOT_SHOW' => $prm_root_show
                    );

                is_array($prm_module_table) ? $prm_module_table_name = $prm_module_table['NAME'] : $prm_module_table_name = $prm_module_table;

                $prm_recursive_use = true;
                switch($prm_module_table_name){
                    case 'master_data':
                        $table['FIELDS']['NAME'] = array('id as id', 'fn_sis_master_data_get_name('.$prm_module_table['ID'].', id, 1) as name');
                        switch($prm_module_table['ID']){
                            case 22:
                            case 29:
                                $table['FIELDS']['ORDER'] = 'name';
                            case 56:
                                $table['FIELDS']['ORDER'] = 'id';
                            break;
                        }
                    break;

                    case 'area':
                        $table['NAME'] = 'ci_sis_master_area';
                    break;

                    case 'company_profile':
                        $table['NAME'] = 'ci_sis_organization_company';
                    break;
                    
                    case 'company_work_location':
                        $prm_query_special = TRUE;
                        $table['NAME'] = 'ci_sis_organization_company_work_location';
                        $table['FIELDS']['NAME'] = array('id', 'name as name');
                        $table['FIELDS']['CAPTION'] = 'name';
                    break;

                    case 'job_specification':
                        $table['NAME'] = 'ci_sis_master_data';
                        $table['FIELDS']['NAME'] = array('id as id', 'fn_sis_master_data_get_name(29, id, 1) as name');
                        $table['FIELDS']['CAPTION'] = 'name';
                    break;

                    case 'company_structure':
                        $table['NAME'] = 'ci_sis_organization_company_structure';
                        $table['FIELDS']['NAME'] = array('id', 'name');

                        $prm_recursive_use = true;
                    break;
                }

                $this->load->model('M_viewlist');

                $return_value = $this->M_viewlist->generate(
                    $prm_dbase,
                    $table['FIELDS']['NAME'], $table['PRIMARY'], $table['FIELDS']['CAPTION'], $table['FIELDS']['ORDER'],
                    $table['NAME'],
                    $prm_where,
                    '',
                    $this->bz_segment['URL'],
                    0,
                    'form',
                    FALSE,
                    FALSE,
                    'none',
                    'NO_HISTORY',
                    FALSE, '',
                    $prm_recursive_use,
                    $table['FIELDS']['PARENT_NAME'],
                    TRUE,
                    $prm_parent_id, 0,
                    '&mdash;', $table['ROOT_SHOW'],
                    FALSE,
                    $prm_query_special
                );


                break;

                default:
                    $type = explode(';', $prm_module_table);

                    if(is_numeric($type[0]) || (isset($type[1]) && is_numeric($type[1]))){
                        if((isset($type[1]) && is_numeric($type[1]))){
                            $prm_module_table = $type[1];

                            $table = array(
                                'NAME' => 'ci_sis_payroll_master_data_static',
                                'WHERE' => array_merge($prm_where, array(
                                    'module_table__id' => $prm_module_table)
                                ),
                                'FIELDS' => '@_id := id as combo_key, `fn_hris_payroll_master_data_static_get_name`('.
                                $prm_module_table.'. @_id as combo_value'
                            );
                        }else{
                            $prm_module_table = $type[0];

                            $table = array(
                                'NAME' => 'ci_sis_master_data',
                                'WHERE' => array_merge(
                                    $prm_where,
                                    array('module_table__id' => $prm_module_table)
                                ),
                                'FIELDS' => 'id as combo_key, fn_sis_master_data_get_name('.$prm_module_table.', id, 1) as combo_value'
                            );
                        }

                        switch($prm_module_table){
                            case 33:
                            case 39:
                            case 43:
                            case 104:
                                $table['ORDER'] = 'combo_key';
                            break;

                            default:
                                $table['ORDER'] = 'combo_value';
                            break;
                        }
                    }else{
                        if($prm_module_table == 'ci_sis_organization_company_structure'){
                            if(isset($prm_where['parent_id'])){
                                if($prm_where['parent_id'] == '0'){
                                    unset($prm_where['parent_it']);
                                }
                            }
                        }

                        $table = array(
                            'NAME' => $prm_module_table,
                            ' WHERE' => $prm_where,
                            'FIELDS' => 'id as combo_key, name as combo_value',
                            'ORDER' => 'combo_value'
                        );

                        switch($prm_module_table){
                            case 'ci_sis_organization_company_structure_position_grade':
                            case 'ci_sis_organization_company_job_title':
                                $table['FIELDS'] = 'position_grade__id as combo_key, fn_sis_master_data_get_name(33, position_grade__id, 1) as combo_value';
                                $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_letter_template':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                            break;

                            case 'ci_sis_organization_job_title':
                                $table['FIELDS'] = 'id as combo_key, name as combo_name';
                                $table['WHERE'] = $prm_where;
                                $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_organization_company_structure':
                            $table['FIELDS'] = 'id as combo_key, name as combo_value';
                            $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_organization_company_work_location':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                                $table['ORDER'] = 'combo_value';
                            break;

                            case 'ci_sis_organization_customer':
                                $table['FIELDS'] = "id as combo_key, id::text||'-'||name as combo_value";
                                $table['ORDER'] = 'combo_value';
                            break;

                            case 'ci_sis_employee_leave_management':
                            case 'ci_sis_attendance_leave_management_company':
                                $table['FIELDS'] = "leave_management__id as combo_key,
                                                    (select case request_type__id when 218 then concat(name, '(', day_type, ')') else name end
                                                    from ci_sis_attendance_leave_management
                                                    where id = leave_management__id and status = 0) as combo_value";
                            break;

                            case 'ci_sis_employee_data':
                                $table['FIELDS'] = 'id as combo_key';
                                if(isset($prm_where['EMPLOYEE_NO_DATA_ID'])){
                                    $table['FIELDS'] .= 'name_official';
                                    $table['WHERE'] = $prm_where['DATA'];
                                }else{
                                    $table['FIELDS'] .= "concat(name_official, ' - ', fn_sis_employee_number_current(id)) as combo_value";
                                }
                            break;

                            case 'ci_sis_employee_company':
                                $table['FIELDS'] = "data__id as combo_key, fn_hris_employee_name_get(data__id) || ' - ' || number as combo_value";
                                $table['WHERE'] = $prm_where;
                            break;

                            case 'ci_sis_attendance_shift_daily':
                                $table['FIELDS'] = 'id as combo_key, code as combo_value';
                            break;

                            case 'ci_sis_career_transition_detail':
                                $table['FIELDS'] = 'transition_item__id as combo_key, fn_sis_m_live_data_combo_filll_career_transition_detail(transition_item___id) as combo_value';
                            break;

                            case 'ci_sis_career_signer':
                                $table['FIELDS'] = 'company__id as hidden_company__id, structure__id as hidden_structure_id, fn_sis_m_live_data_combo_fill_career_signer(company__id, structure___id) as combo_key, fn_sis_employee_name_get(fn_sis_m_live_dta_combo_fill_career_signer(company__id, structure__id) as combo_value)';
                            break;

                            case 'ci_sis_letter_pattern_number':
                            case 'ci_sis_letter_template_category':
                            case 'ci_sis_eki_period':
                            case 'ci_sis_master_currency':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                            break;
                            case 'ci_sis_career_transition_letters':
                                $table['FIELDS'] = 'letter_template__id as combo_key, fn_sis_m_live_data_combo_fill_career_transition_letters(letter_template__id) as combo_value';
                            break;

                            case 'ci_sis_letter_template':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                            break;

                            case 'ci_sis_eclaim_master_data_official_purposes':
                                $table['FIELDS'] = 'id as combo_key, op_name as combo_value';
                                $table['WHERE'] = $prm_where;
                                $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_eclaim_master_data_destination_office':
                                $table['FIELDS'] = 'id as combo_key, do_name as combo_value';
                                $table['WHERE'] = $prm_where;
                                $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_asset_master_item_group':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                                $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_asset_master_item_cat':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                                $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_asset_master_item_brand':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                                $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_master_data_language':
                                $table['FIELDS'] = 'data__id as combo_key, name as combo_value';
                                $table['WHERE'] = $prm_where;
                                $table['ORDER'] = 'combo_key';
                            break;

                            case 'ci_sis_master_instantion':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                                $table['WHERE'] = $prm_where;
                            break;

                            case 'ci_sis_letter_template':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                                $table['WHERE'] = $prm_where;
                            break;

                            case 'ci_sis_letter':
                                $table['FIELDS'] = 'id as combo_key, name as combo_value';
                                $table['HWERE'] = $prm_where;
                            break;
                        }
                    }

                    $return_value = $this->M_database->datas
                        (
                            $prm_dbase,
                            $table['NAME'], $table['WHERE'], $table['FIELD'],
                            FALSE,
                            $table['ORDER'],
                            '',
                            '', '',
                            $prm_query_special,
                            FALSE, '',
                            TRUE                    
                        );
                break;
            }

            if($prm_choose_show){
                $return_value = array('' => ' - choose - ') + $return_value;
            }

            if(trim($prm_object_start) != ''){
                $return_value = array($prm_js_action, $return_value, $prm_object_start, $prm_ajax_returned_value);
            }

            return $return_value;
        }

        public function get_combobox($prm_dbase = 'db', $prm_module_table = '', $prm_parent = '', $prm_where = array(), $prm_selected_value = ''){
            $db = $this->{$prm_dbase};

            if(is_numeric($prm_module_table)){
                $strQuery = "SELECT
                                a.id as combo_key,
                                b.name as combo_name
                                FROM
                                ci_sis_master_data a
                                JOIN ci_sis_master_data_language b
                                ON a.id = b.data__id
                                WHERE a.module_table__id = $prm_module_table and language__id = 1";
            }else{
                switch($prm_module_table){
                    case 'ci_system_language':
                        $strQuery = "SELECT id as combo_key, name as combo_name from ci_system_language";
                    break;

                    case 'ci_sis_library_master_data':
                        $strQuery = "SELECT
                                        id as combo_key,
                                        name as combo_name
                                        FROM ci_sis_library_master_data
                                        $prm_where[0]";
                    break;
                }
            }

            $query = $this->db->query($strQuery);

            $return_value = $query->result_array();

            return $return_value;
        }

        public function put($prm_table = '', $prm_id = '', $prm_where = array()){
            if(is_numeric($prm_table)){
                trim($prm_id) == 0 ? $where = '' : $where = "and b.data__id = '$prm_id'";
                $strQuery = "select a.id,
                                language__id,
                                (select name from ci_system_language c where c.id = b.language__id) as language,
                                b.name,
                                coalesce(b.description, '') as description
                                from ci_sis_master_data a
                                inner join ci_sis_master_data_language b on a.id = b.data__id
                                where a.module_table__id = '$prm_table' $where order by id asc";
            }else{
                switch($prm_table){
                    case 'ci_sis_library_master_book':
                        trim($prm_id) == 0 ? $where = '' : $where = "where id = '$prm_id'";
                        $strQuery = "SELECT
                                        id,
                                        number,
                                        title,
                                        author,
                                        genre__id,
                                        release_year,
                                        description,
                                        (select name from ci_sis_master_data_language b where b.data__id = genre__id and language__id = 1) as genre
                                        FROM ci_sis_library_master_book order by title";
                    break;

                    case 'ci_sis_master_data_language':
                        $strQuery = "SELECT
                                        language__id as language,
                                        data__id as id,
                                        name,
                                        description
                                        from $prm_table where";
                    break;
                }
            }
            if(!empty($prm_where)){
                $where = array();
                $counter = 0;
                foreach($prm_where as $key => $value){
                    if($counter > 0){
                        $strQuery .= ' AND ';
                    }

                    $strQuery .= " $key = ?";
                    array_push($where, $value);
                    $counter++;
                }
            }


            $query = $this->db->query($strQuery, $where);

            return $query->result_array();
        }

        public function insert($prm_table = '', $prm_data = array(), $prm_where = array(), $prm_id = '', $prm_type = ''){
            if(trim($prm_id) == ''){
                $this->db->insert($prm_table, $prm_data);
                $return_value = array('js_form_insert', array('Successfully Added New Data!', 'ok', 'success'));
            }else{
                (!empty($prm_where)) ? $where = $prm_where : $where = array('id' => $prm_id);
                $this->db->where($where);
                $this->db->update($prm_table, $prm_data);
                $return_value = array('js_form_update', array('Successfully Update The Data!', 'ok', 'success'));
            }

            if(!$this->db->affected_rows() > 0){
                $return_value = array('js_form_error', array('Error when save data', 'error', 'warning'));
            }

            return $return_value;

        }

        public function delete($prm_table = '', $prm_id = ''){
            if(is_numeric($prm_table)){
                $query = $this->db->delete('ci_sis_master_data_language', array('data__id' => $prm_id));
                if($this->db->affected_rows() > 0){
                    $query = $this->db->delete('ci_sis_master_data', array('id' => $prm_id));
                }
            }else{
                $query = $this->db->delete($prm_table, array('id' => $prm_id));
            }

            $return_value = array('js_delete_action', array('Successfully Deleted the Data!', 'ok', 'success'));
            if(!$this->db->affected_rows() > 0){
                $return_value = array('js_delete_error', array('Something wrong when delete the data!', 'error', 'warning'));
            }

            return $return_value;
        }
}

?>