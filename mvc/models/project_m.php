<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class project_m extends MY_Model {
	protected $_table_name = 'projects';
	protected $_primary_key = 'project_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "project_id desc";
	function __construct() {
		parent::__construct();
	}
	function get_project($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}
	function get_project_task($id=NULL) {
		if ($id==NULL) {
			$query = $this->db->get('tasks');
			return $query->result();
		} else {
			$query = $this->db->get_where('tasks', array('project_id' => $id));
			return $query->result();
		}

	}
	function get_single_task($id=NULL) {
		$query = $this->db->get_where('tasks', array('task_id' => $id));
		return $query->row();

	}
	function get_project_task_complete($id) {
		$query = $this->db->get_where('tasks', array('project_id' => $id, 'status' => 1));
		return $query->result();
	}
	function get_order_by_project($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}
	function insert_project($array) {
		$error = parent::insert($array);
		return TRUE;
	}
	function insert_project_task($array) {
		$query = $this->db->insert('tasks', $array); 
		return TRUE;
	}
	function update_project($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}
	public function delete_project($id){
		parent::delete($id);
	}
	function get_user_tasks($user_id) {
		$this->db->select('*');
		$this->db->from('task_user');
		$this->db->where(array('task_user.user_id' => $user_id));
		$this->db->join('tasks', 'tasks.task_id = task_user.task_id');
		$query = $this->db->get();
		return $query->result();
	}
}



/* End of file project_m.php */

/* Location: .//D/xampp/htdocs/school/mvc/models/project_m.php */