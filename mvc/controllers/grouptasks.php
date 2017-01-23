<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grouptasks extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model("grouptasks_m");
		$this->load->model("grptaskslist_m");
		$this->load->model('tasks_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('grouptasks', $language);	
	}
	public function index() {
		$usertype = $this->session->userdata("usertype");
		if($usertype) {
			$this->data['grouptasks'] = $this->grouptasks_m->get_grouptasks();
			$this->data["subview"] = "grouptasks/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	protected function rules() {
		$rules = array(
				array(
					'field' => 'group_name', 
					'label' => $this->lang->line("grouptasks_gname"),
					'rules' => 'trim|required|xss_clean'
				),
				array(
					'field' => 'date', 
					'label' => $this->lang->line("date"),
					'rules' => 'trim|required|xss_clean'
				),
				array(
					'field' => 'description', 
					'label' => 'Description', 
					'rules' => 'trim|required|xss_clean|max_length[128]'
				)
			);
		return $rules;
	}
	public function add() {
		$usertype = $this->session->userdata("usertype");
		$project_id = $this->uri->segment(3);
		if ((int)$project_id) {
			if($usertype == "Admin" || $usertype == "Project manager") {
				$this->data['tasks'] = $this->tasks_m->get_order_by_tasks(array('status' => 0, 'project_id'=>$project_id));
				if($_POST) {
					$rules = $this->rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data['form_validation'] = validation_errors(); 
						$this->data["subview"] = "grouptasks/add";
						$this->load->view('_layout_main', $this->data);			
					} else {
						$array = array(
							'group_name' => $this->input->post('group_name'),
							'project_id' => $project_id,
							'date' => $this->input->post('date'),
							'description' => $this->input->post('description')
						);
						$this->grouptasks_m->insert_grouptasks($array);
						$groupID = $this->db->insert_id();

						if($this->input->post('tasks')) {
							$tasks = $this->input->post('tasks');
							foreach($tasks as $task){
								$getDbTask = $this->tasks_m->get_tasks($task);
								$taskArray = array(
									'groupID' => $groupID,									
									'tasksID' => $getDbTask->task_id,
									'name' => $getDbTask->task_title
								);
								$this->grptaskslist_m->insert_grptaskslist($taskArray);
					    	}
					    }
					    redirect(base_url("project/view/$project_id"));
					}
				} else {
					$this->data["subview"] = "grouptasks/add";
					$this->load->view('_layout_main', $this->data);
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
	public function edit() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "Project manager") {
			$url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['grouptask'] = $this->grouptasks_m->get_grouptasks($id);

				if ($this->data['grouptask']) {
					$this->data['tasks'] = $this->tasks_m->get_order_by_tasks(array('status' => 0, 'project_id'=>$this->data['grouptask']->project_id));
					$dbarr = $this->grptaskslist_m->get_order_by_grptaskslist(array('groupID' => $this->data['grouptask']->grouptasksID));
										
					foreach ($dbarr as $dbar) {
						$status = $this->tasks_m->get_order_by_tasks(array('task_id' => $dbar->tasksID, 'status' => 1));
						if(count($status)) {
							$d = array(
								"task_id" => $dbar->tasksID,
							    "task_title" => $dbar->name
							);
							$this->data['tasks'][] = (object) $d;
						}
					}
					// $this->data['tasks'] = $this->tasks_m->get_tasks();
					$this->data['ctasks'] = $this->grptaskslist_m->get_order_by_grptaskslist(array('groupID' => $this->data['grouptask']->grouptasksID));

					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "grouptasks/edit";
							$this->load->view('_layout_main', $this->data);			
						} else {
							$array = array(
								'group_name' => $this->input->post('group_name'),
								'date' => $this->input->post('date'),
								'description' => $this->input->post('description')
							);
							$this->grouptasks_m->update_grouptasks($array, $id);

							if($this->input->post('tasks')) {
								$tasks = $this->input->post('tasks');
								foreach($tasks as $task){
									$getDbTaskList = $this->grptaskslist_m->get_single_grptaskslist(array('groupID' => $id, 'tasksID' => $task));
									if(count($getDbTaskList)) {
										$getDbTask = $this->tasks_m->get_tasks($task);
										$taskArray = array(
											'name' => $getDbTask->task_title
										);
										$this->grptaskslist_m->update_grptaskslist($taskArray, $getDbTaskList->grptaskslistID);
									} else {
										$getDbTask = $this->tasks_m->get_tasks($task);
										$taskArray = array(
											'groupID' => $id,
											'tasksID' => $getDbTask->task_id,
											'name' => $getDbTask->task_title
										);
										$this->grptaskslist_m->insert_grptaskslist($taskArray);
									}
						    	}

						    	$getDbTaskListes = $this->grptaskslist_m->get_order_by_grptaskslist(array('groupID' => $id));
						    	foreach ($getDbTaskListes as $getDBTasks) {
						    		if(!in_array($getDBTasks->tasksID, $tasks)) {
						    			$this->grptaskslist_m->delete_grptaskslist($getDBTasks->grptaskslistID);
						    		}
						    	}
						    	
						    }
				
							redirect(base_url("project/view/$url"));
						}
					} else {
						$this->data["subview"] = "grouptasks/edit";
						$this->load->view('_layout_main', $this->data);
					}
				} else {
					redirect(base_url('project/view/$url'));
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
		$url = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "Project manager") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->grouptasks_m->delete_grouptasks($id);
				$getDbTaskListes = $this->grptaskslist_m->get_order_by_grptaskslist(array('groupID' => $id));
				foreach ($getDbTaskListes as $getDBTasks) {
		    		$this->grptaskslist_m->delete_grptaskslist($getDBTasks->grptaskslistID);
		    	}

				redirect(base_url("project/view/$url"));
			} else {
				redirect(base_url("project/view/$url"));
			}	
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function view() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));

		if((int)$id) {
			$this->data['grouptasks'] = $this->grouptasks_m->get_grouptasks($id);
			if(count($this->data['grouptasks'])) {
				$this->data['tasks'] = $this->tasks_m->get_order_by_tasks();
				$this->data['ctasks'] = $this->grptaskslist_m->get_order_by_grptaskslist(array('groupID' => $this->data['grouptasks']->grouptasksID));
				$tmp_arr = array();
				$count = 0;
				foreach ($this->data['ctasks'] as $grptask) {
					foreach ($this->data['tasks'] as $alltask) {
						if($grptask->tasksID == $alltask->task_id) {
							if($alltask->status != 0) {
								$count++;
							}
							$tmp_arr[] = array (
								"taskID" => $alltask->task_id,
								"task_name" => $alltask->task_title,
								"task_status" => $alltask->status,
								"description" => $alltask->description
							);
						}
					}
				}
				if (count($this->data['ctasks'])==0) {
					$this->data['grptask_progress'] = 0;
				} else {
					$this->data['grptask_progress'] = ceil((100/count($this->data['ctasks']))*$count);
				}				
				$this->data['alltasks'] = $tmp_arr;

				$this->data["subview"] = "grouptasks/view";
				$this->load->view('_layout_main', $this->data);
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}	
	}

}
/* End of file grouptasks.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/grouptasks.php */