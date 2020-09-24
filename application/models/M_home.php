<?php 

class M_home extends CI_Model{
	public function getUserAuth($prm_user){
        $query = $this->db->query("select auth_type__id from ci_sis_user_data where system_user__id = '$prm_user'");

        return $query->row('auth_type__id');
    }
}

?>