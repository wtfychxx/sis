<?php 

class Template{
	protected $_ci;

	public function __construct(){
		$this->_ci =& get_instance();
		$this->_ci->load->model('M_Home');
	}

	public function display($template, $data = null){
		// // $where = array(
		// // 	'group_id' => $data['group_id']
		// // );

		// // $data['menu'] = $this->_ci->M_home->data_menu($where);
		// $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
		$this->_ci->load->view('admin/partials/base_view.php', $data);
	}
}

?>