<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_m extends MY_Model {

	function __construct() {
		parent::__construct();
	}
	public function login() {
		$tables = array('users' => 'users');
		$array = array();
		$i = 0;
		$userID = "";
		$userIDarray = array();
		$username = $this->input->post('username');
		$password = $this->hash($this->input->post('password'));
		$userdata = '';
		foreach ($tables as $table) {
			$user = $this->db->get_where($table, array("username" => $username, "password" => $password));
			$alluserdata = $user->row();
			if($table == "users") {
				$userID = "userID";
			} else {
				$userID = $table."ID";
			}
			if(count($alluserdata)) {
				$userdata = $alluserdata;
				$array['permition'][$i] = 'yes';
				$userIDarray["userID"] =  $alluserdata->$userID;
			} else {
				$array['permition'][$i] = 'no';
			}
			$i++;

		}
		if(in_array('yes', $array['permition'])) {

			$data = array(

				"name" => $userdata->name,

				"email" => $userdata->email,

				"usertype" => $userdata->usertype,

				"username" => $userdata->username,

				"photo" => $userdata->photo,

				"lang" => "english",

				"loggedin" => TRUE,

				"userID" => $userdata->userID

			);

			$this->session->set_userdata($data);

			return TRUE;

		} else {

			return FALSE;

		}			

	}

	function change_password() {
		$table = "users";
		$username = $this->session->userdata("username");
		$old_password = $this->hash($this->input->post('old_password'));
		$new_password = $this->hash($this->input->post('new_password'));

		$user = $this->db->get_where($table, array("username" => $username, "password" => $old_password));

		$alluserdata = $user->row();

		if(count($alluserdata)) {
			if($alluserdata->password == $old_password){
				$array = array(
					"password" => $new_password
				);
				$this->db->where(array("username" => $username, "password" => $old_password));
				$this->db->update($table, $array);
				return TRUE; 
			}
		} else {
			return FALSE;
		}
	}
	public function logout() {
		$this->session->sess_destroy();
	}



	public function loggedin() {
		return (bool) $this->session->userdata("loggedin");
	}

	function hash($string) {

		return parent::hash($string);

	}



}



/* End of file login_m.php */

/* Location: .//E/Xampp/htdocs/ini_complain/mvc/models/login_m.php */