<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timetracker_m extends MY_Model {
	protected $_table_name = 'timetracker';
	protected $_primary_key = 'timetrackerID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "timetrackerID desc";

	function __construct() {
		parent::__construct();
	}

	function get_timetracker($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_timetracker($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_timetracker($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_timetracker($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_timetracker($id){
		parent::delete($id);
	}

	function get_user_tasks($id) {
		$this->db->select('*');
		$this->db->from('task_user');
		$this->db->where(array('task_user.user_id' => $id));
		$this->db->join('tasks', 'tasks.task_id = task_user.task_id');
		$query = $this->db->get();
		return $query->result();
	}

	function get_user_tasks_with_project_id($userID,$id) {
		$this->db->select('*');
		$this->db->from('task_user');
		$this->db->where(array('task_user.user_id' => $userID, 'tasks.project_id' => $id));
		$this->db->join('tasks', 'tasks.task_id = task_user.task_id');
		$query = $this->db->get();
		return $query->result();
	}

	function get_user_timetracker($userID) {
		$this->db->select('*');
		$this->db->from('timetracker');
		$this->db->where(array('timetracker.userID' => $userID));
		$this->db->join('tasks', 'tasks.task_id = timetracker.taskID', 'left');
		$this->db->join('users', 'timetracker.userID = users.userID', 'left');
		$this->db->join('projects', 'timetracker.projectID = projects.project_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_timetracker() {
		$this->db->select('*');
		$this->db->from('timetracker');
		$this->db->join('tasks', 'tasks.task_id = timetracker.taskID', 'left');
		$this->db->join('users', 'timetracker.userID = users.userID', 'left');
		$this->db->join('projects', 'timetracker.projectID = projects.project_id', 'left');
		$this->db->order_by("timetracker.projectID", "desc");
		$query = $this->db->get();
		return $query->result();
	}

	function get_single_project_timetracker($id) {
		$this->db->select('*');
		$this->db->from('timetracker');
		$this->db->where(array('timetracker.projectID' => $id));
		$this->db->join('tasks', 'tasks.task_id = timetracker.taskID', 'left');
		$this->db->join('users', 'timetracker.userID = users.userID', 'left');
		$this->db->join('projects', 'timetracker.projectID = projects.project_id', 'left');
		$this->db->order_by("timetracker.projectID", "desc");
		$query = $this->db->get();
		return $query->result();
	}

}



/* End of file timetracker_m.php */

/* Location: .//D/xampp/htdocs/school/mvc/models/timetracker_m.php */