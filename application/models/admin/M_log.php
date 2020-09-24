<?php

class M_log extends CI_Model{
    function write($prm_dbase = '', $prm_action_note = ''){
        if($this->session->userdata('user_id') != ''){
            if($this->session->userdata('user_menu_array')){
                $this->load->helper('array');

                $menu = array_search_recursive();
            }
        }
    }
}

?>