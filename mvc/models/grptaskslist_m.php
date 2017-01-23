<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Grptaskslist_m extends MY_Model {
	protected $_table_name = 'grptaskslist';
	protected $_primary_key = 'grptaskslistID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "grptaskslistID desc";

	function __construct() {
		parent::__construct();
	}

	function get_grptaskslist($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}


	function get_order_by_grptaskslist($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_single_grptaskslist($array) {
		$query = parent::get_single($array);
		return $query;
	}

	function insert_grptaskslist($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_grptaskslist($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_grptaskslist($id){
		parent::delete($id);
	}
}



/* End of file grptaskslist_m.php */

/* Location: .//D/xampp/htdocs/school/mvc/models/grptaskslist_m.php */