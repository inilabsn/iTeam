<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grouptasks_m extends MY_Model {
	protected $_table_name = 'grouptasks';
	protected $_primary_key = 'grouptasksID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "grouptasksID desc";

	function __construct() {
		parent::__construct();
	}

	function get_grouptasks($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_grouptasks($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_grouptasks($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_grouptasks($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_grouptasks($id){
		parent::delete($id);
	}

}



/* End of file grouptasks_m.php */

/* Location: .//D/xampp/htdocs/school/mvc/models/grouptasks_m.php */