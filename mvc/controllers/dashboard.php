<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("dashboard_m");
		$this->load->model("tasks_m");
		$this->load->model("notice_m");		
		$this->load->model("project_m");
	}
	public function index() {
		
		$usertype = $this->session->userdata("usertype");
		$userID = $this->session->userdata("userID");
		$id = $userID;
		if($usertype == "Admin" || $usertype == "Project manager"){
			$this->data['users'] = $this->dashboard_m->get_users();
			$this->data['user_count'] = count($this->data['users']);			
			$this->data['notices'] = $this->notice_m->get_notice();
			$this->data['notice_count'] = count($this->data['notices']);
			$this->data['projects'] = $this->project_m->get_project();
			$this->data['project_count'] = count($this->data['projects']);
			$this->data['tasks'] = $this->tasks_m->get_tasks();
			$this->data['task_count'] = count($this->data['tasks']);
			$this->data["subview"] = "dashboard/home";
			$this->load->view('_layout_main', $this->data);
		}  elseif($usertype == "User") {			
			$this->data['notices'] = $this->notice_m->get_notice();
			$this->data['notice_count'] = count($this->data['notices']);
			$this->data["subview"] = "dashboard/home";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	function project() {
		$projects = $this->project_m->get_project();
		$all = array();
		$counter = 0;
		$task_counter = 0;
		$task_counter_cm = 0;
		$process = 0;
		foreach ($projects as $project) {
			$day = date('d-m-Y', strtotime($project->project_create_date));
			$date1 = new DateTime($project->project_create_date);
			$date2 = new DateTime($project->project_deadline);
			$interval = $date1->diff($date2);

			$tasks = $this->tasks_m->get_order_by_tasks(array('project_id' => $project->project_id));
			if(count($tasks)) {
				foreach ($tasks as $task) {
					if($task->status !=0) {
						$task_counter_cm++;
					}
					$task_counter++;
				}
			}

			$process = floatval((1/$task_counter) * $task_counter_cm);

			$all[] = array('projectID' => $project->project_id, 'project' => $project->project_title, "day" => $day, 'duration' => $interval->days, 'process' => $process);
			$counter++;
			$task_counter = 0;
			$task_counter_cm = 0;
			$process = 0;
		}

		$json = array('ms' => $all, 'counter' => $counter);
		header("Content-Type: application/json", true);
		echo json_encode($json);
		exit;
	}

	function gantt() {
		include(APPPATH.'libraries/gantt.php');

		$gantt = new JSONGanttConnector($this->db, "PHPCI");
		$gantt->configure(            
			"projects",
			"project_id",
			"project_create_date"
			);        
		$gantt->render();
		
	}
}
/* End of file dashboard.php */
/* Location: .//D/xampp/htdocs/ini_complain/mvc/controllers/dashboard.php */