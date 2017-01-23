<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_m extends MY_Model {

	protected $_table_name = 'users';
	protected $_primary_key = 'userID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "userID asc";

	public $rules = array(
		'username' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required|xss_clean'
		), 
		'fullname' => array(
			'field' => 'fullname', 
			'label' => 'Fullname', 
			'rules' => 'trim|required|xss_clean'
		), 
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required'
		)
	);

	function get_insert($fields) {
		$data = array();
		foreach ($fields as $field) {
			$field_name = $field['field'];
			$data[$field['field']] = $this->input->post($field_name);
		}
		return $data;
	}

	function get($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_user($array=NULL) {
		$query = parent::get_order_by_data($array);
		return $query;
	}

	function insert_user($array) {
		$error = parent::insert_data($array);
		return TRUE;
	}

	function update_user($data, $id = NULL) {
		parent::update_data($data, $id);
		return $id;
	}

	public function delete_user($id){
		parent::delete_data($id);
	}
}

/* End of file users_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/users_m.php */