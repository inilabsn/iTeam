<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_m extends MY_Model {

	protected $_table_name = 'settings';
	protected $_primary_key = 'settingID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "settingID asc";

	function __construct() {
		parent::__construct();
	}
	
	function get_setting($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_setting($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_setting($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_setting($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}



}
