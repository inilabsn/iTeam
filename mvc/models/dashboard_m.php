<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard_m extends MY_Model {

	function __construct() {
		parent::__construct();
	}
	function get_user() {
		$table = strtolower($this->session->userdata("usertype"));
		if($table == "admin") {
			$table = "settings";
		}
		if($table == "users") {
			$table = "users";
		}
		$username = $this->session->userdata("username");
		$user = $this->db->get_where($table, array("username" => $username));
		return $user->row();
	}

	function get_users() {
		$user = $this->db->get('users');
		return $user->result();
	}

	function get_notice() {
		$user = $this->db->get('notice');
		return $user->result();
	}

}