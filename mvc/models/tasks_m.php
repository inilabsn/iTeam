<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tasks_m extends MY_Model {
	protected $_table_name = 'tasks';
	protected $_primary_key = 'task_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "task_id desc";

	function __construct() {
		parent::__construct();
	}

	function get_tasks($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}


	function get_order_by_tasks($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function get_order_by_project_tasks() {
		$this->db->select('*');
		$this->db->from('tasks');
		$this->db->join('grptaskslist', 'grptaskslist.tasksID = tasks.task_id');
		$query = $this->db->get();
		return $query->result();
	}

	function insert_tasks($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_tasks($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_tasks($id){
		parent::delete($id);
	}
}



/* End of file tasks_m.php */

/* Location: .//D/xampp/htdocs/school/mvc/models/tasks_m.php */