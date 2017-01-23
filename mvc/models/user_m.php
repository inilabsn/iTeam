<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class user_m extends MY_Model {

	protected $_table_name = 'users';
	protected $_primary_key = 'userID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "userID asc";
	function __construct() {
		parent::__construct();
	}

	function get_username($table, $data=NULL) {
		$query = $this->db->get_where($table, $data);
		return $query->result();
	}
	function get_user($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}
	function get_order_by_user($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}
	function insert_user($array) {
		$error = parent::insert($array);
		return TRUE;
	}
	function update_user($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}
	function delete_user($id){
		parent::delete($id);
	}
	function hash($string) {
		return parent::hash($string);
	}

	 function get_user_as_client ()
	{
		// Fetch clients without parents
		$this->db->select('*');
		$this->db->where('usertype', 'Client');
		$clients = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'Any'
		);
		if (count($clients)) {
			foreach ($clients as $client) {
				$array[$client->userID] = $client->name;
			}
		}
		
		return $array;
	}

	public function get_user_as_user ()
	{
		// Fetch clients without parents
		$this->db->select('*');
		$this->db->where('usertype', 'User');
		$clients = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'Any'
		);
		if (count($clients)) {
			foreach ($clients as $client) {
				$array[$client->userID] = $client->name;
			}
		}
		
		return $array;
	}
}



/* End of file user_m.php */

/* Location: .//E/Xampp/htdocs/ini_complain/mvc/models/user_m.php */