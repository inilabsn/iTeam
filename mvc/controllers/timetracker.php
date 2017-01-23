<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timetracker extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model("timetracker_m");
		$this->load->model('tasks_m');
		$this->load->model('project_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('timetracker', $language);	
	}
	public function index() {
		$usertype = $this->session->userdata("usertype");
		$userID = $this->session->userdata("userID");
		if($usertype) {
			$this->data['timetrackers'] = $this->timetracker_m->get_user_timetracker($userID);
			$this->data["subview"] = "timetracker/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	protected function rules() {
		$rules = array(
				array(
					'field' => 'date', 
					'label' => $this->lang->line("timetracker_date"),
					'rules' => 'trim|required|xss_clean|max_length[10]'
				),
				array(
					'field' => 'hour', 
					'label' => $this->lang->line("timetracker_hour"),
					'rules' => 'trim|required|xss_clean|max_length[10]'
				),
				array(
					'field' => 'taskID', 
					'label' => $this->lang->line("timetracker_tasks"),
					'rules' => 'trim|required|xss_clean|max_length[128]'
				),
				array(
					'field' => 'project_id', 
					'label' => $this->lang->line("timetracker_project"),
					'rules' => 'trim|required|xss_clean|max_length[128]'
				)
			);
		return $rules;
	}
	public function add() {
		$usertype = $this->session->userdata("usertype");
		$userID = $this->session->userdata('userID');
		$this->data['projects'] = $this->project_m->get_project();
		if($usertype == "User") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['set'] = $id;
				$this->data['tasks'] = $this->timetracker_m->get_user_tasks_with_project_id($userID,$id);
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data['form_validation'] = validation_errors(); 
						$this->data["subview"] = "timetracker/add";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$task = $this->tasks_m->get_tasks($this->input->post('taskID'));
						$array = array(
							'date' => $this->input->post('date'),
							'timehour' => $this->input->post('hour'),
							'projectID' => $task->project_id,
							'taskID' => $this->input->post('taskID'),
							'userID' => $userID,
							'usertype' => $usertype
						);
						
						$this->timetracker_m->insert_timetracker($array);
					    redirect(base_url("timetracker/index"));
					}
				} else {
					$this->data["subview"] = "timetracker/add";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data['set'] = 0;
				$this->data['tasks'] = $this->timetracker_m->get_user_tasks($userID);
				$this->data["subview"] = "timetracker/add";
				$this->load->view('_layout_main', $this->data);
			}
		} elseif($usertype == "Admin" || $usertype == "Project manager") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['set'] = $id;
				$this->data['tasks'] = $this->tasks_m->get_order_by_tasks(array('project_id' => $id));
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data['form_validation'] = validation_errors(); 
						$this->data["subview"] = "timetracker/add";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$task = $this->tasks_m->get_tasks($this->input->post('taskID'));
						$array = array(
							'date' => $this->input->post('date'),
							'timehour' => $this->input->post('hour'),
							'projectID' => $task->project_id,
							'taskID' => $this->input->post('taskID'),
							'userID' => $userID,
							'usertype' => $usertype
						);
						
						$this->timetracker_m->insert_timetracker($array);
					    redirect(base_url("timetracker/index"));
					}
				} else {					
					$this->data["subview"] = "timetracker/add";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data['set'] = 0;
				$this->data['tasks'] = $this->tasks_m->get_tasks();
				$this->data["subview"] = "timetracker/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	public function edit() {
		$usertype = $this->session->userdata("usertype");
		$this->data['projects'] = $this->project_m->get_project();
		// if($usertype ==  "User") {
		// 	$project_id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		// 	$id = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
		// 	if((int)$id) {
		// 		$this->data['timetracker'] = $this->timetracker_m->get_timetracker($id);
		// 		if ($this->data['timetracker']) {
		// 			$userID = $this->session->userdata('userID');
		// 			$this->data['tasks'] = $this->timetracker_m->get_user_tasks($userID);

		// 			if($_POST) {
		// 				$rules = $this->rules();
		// 				$this->form_validation->set_rules($rules);
		// 				if ($this->form_validation->run() == FALSE) {
		// 					$this->data["subview"] = "timetracker/edit";
		// 					$this->load->view('_layout_main', $this->data);			
		// 				} else {
		// 					$array = array(
		// 						'date' => $this->input->post('date'),
		// 						'timehour' => $this->input->post('hour'),
		// 						'taskID' => $this->input->post('taskID'),
		// 					);
		// 					$this->timetracker_m->update_timetracker($array, $id);
		// 					redirect(base_url("timetracker/index"));
		// 				}
		// 			} else {
		// 				$this->data["subview"] = "timetracker/edit";
		// 				$this->load->view('_layout_main', $this->data);
		// 			}
		// 		} else {
		// 			redirect(base_url('timetracker/index;'));
		// 		}
		// 	} else {
		// 		$this->data["subview"] = "error";
		// 		$this->load->view('_layout_main', $this->data);
		// 	}	
		// } else
		if($usertype == "Admin" || $usertype == "Project manager") {
			$project_id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			if((int)$id && (int)$project_id) {
				$this->data['timetracker'] = $this->timetracker_m->get_timetracker($id);
				if ($this->data['timetracker']) {
					$userID = $this->session->userdata('userID');
					$this->data['set'] = $project_id;
					$this->data['tasks'] = $this->tasks_m->get_order_by_tasks(array('project_id' => $project_id));
					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "timetracker/edit";
							$this->load->view('_layout_main', $this->data);			
						} else {
							$array = array(
								'date' => $this->input->post('date'),
								'timehour' => $this->input->post('hour'),
								'taskID' => $this->input->post('taskID'),
								'projectID' => $this->input->post('project_id'),
							);
							$this->timetracker_m->update_timetracker($array, $id);
							redirect(base_url("timetracker/index"));
						}
					} else {
						$this->data["subview"] = "timetracker/edit";
						$this->load->view('_layout_main', $this->data);
					}
				} else {
					redirect(base_url('timetracker/index;'));
				}
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	
	public function delete() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "User") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->timetracker_m->delete_timetracker($id);
				redirect(base_url("timetracker/index"));
			} else {
				redirect(base_url("timetracker/index"));
			}	
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function task_list() {
		$project_id = $this->input->post('id');
		if((int)$project_id) {
			$string = base_url("timetracker/add/$project_id");
			echo $string;
		} else {
			redirect(base_url("timetracker/add"));
		}
	}
	public function task_list_edit() {
		$project_id = $this->input->post('id');
		if((int)$project_id) {
			$string = base_url("timetracker/edit/$project_id");
			echo $string;
		} else {
			redirect(base_url("timetracker/index"));
		}
	}
	function task_return() {
		$usertype = $this->session->userdata("usertype");
		$id = $this->input->post('id');
		if((int)$id) {
			if($usertype) {
				$all_task = $this->tasks_m->get_order_by_tasks(array('project_id' => $id));
				echo "<option value='0'>", $this->lang->line("timetracker_task_select"),"</option>";
				foreach ($all_task as $value) {
					echo "<option value=\"$value->task_id\">",$value->task_title,"</option>";
				}
			}
		} 
	}

}
/* End of file timetracker.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/timetracker.php */