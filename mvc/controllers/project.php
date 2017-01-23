<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class project extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model("project_m");
		$this->load->model("user_m");
		$this->load->model("tasks_m");
		$this->load->model("grouptasks_m");
		$this->load->model("grptaskslist_m");
		$this->load->model("timetracker_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('project', $language);	
	}
	public function index() {
		// $time = 0;
		$usertype = $this->session->userdata("usertype");
		if ($usertype) {
			$this->data['projects'] = $this->project_m->get_project();
			$this->data['tasks'] = $this->project_m->get_project_task();
			foreach ($this->data['projects'] as $key => $project) {	
				$time = 0;		
				$alltimes = $this->timetracker_m->get_order_by_timetracker(array('projectID' => $project->project_id));
				if(count($alltimes)) {
					foreach ($alltimes as  $alltime) {
						$time += $alltime->timehour;
					}
					$this->data['projects'][$key]=(object) array_merge( (array)$project, array( 'time' => $time ) );
				} else {
					$this->data['projects'][$key]=(object) array_merge( (array)$project, array( 'time' => $time ) );
				}
			}
			$this->data["subview"] = "project/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	protected function rules() {
		$rules = array(
				array(
					'field' => 'project_title', 
					'label' => $this->lang->line("project_title"), 
					'rules' => 'trim|required|xss_clean|max_length[128]'
				),
				array(
					'field' => 'project_create_date', 
					'label' => $this->lang->line("project_create_date"),
					'rules' => 'trim|required|max_length[10]|xss_clean'
				),  
				array(
					'field' => 'project_deadline', 
					'label' => $this->lang->line("project_deadline"),
					'rules' => 'trim|required|max_length[10]|xss_clean'
				),
				array(
					'field' => 'project_description', 
					'label' => $this->lang->line("project_description"),
					'rules' => 'trim|xss_clean'
				)
			);
		return $rules;
	}
	protected function task_rules() {
		$rules = array(
				array(
					'field' => 'title', 
					'label' => 'Title',
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
		if($usertype == "Admin" || $usertype == "Project manager") {
			$this->data['clients'] = $this->user_m->get_user_as_client();
			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data['form_validation'] = validation_errors(); 
					$this->data["subview"] = "project/add";
					$this->load->view('_layout_main', $this->data);			
				} else {
					if ($this->input->post("project_client_id")) {
						$data['client'] = $this->user_m->get_user($this->input->post("project_client_id"));
					}
					$array = array(
						"project_title" => $this->input->post("project_title"),
						"project_create_date" => $this->input->post("project_create_date"),
						"project_deadline" => $this->input->post("project_deadline"),						
						"project_description" => $this->input->post("project_description"),
						"project_percentage" => 0,
						"project_status" => 'in progress',
						"project_client_name" => $data['client']->name,
					);
					$this->project_m->insert_project($array);
					redirect(base_url("project/index"));
				}
			} else {
				// Load view
				$this->data["subview"] = "project/add";
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
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['project'] = $this->project_m->get_project($id);
				$this->data['clients'] = $this->user_m->get_user_as_client();
				if ($this->data['project']) {
					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "project/edit";
							$this->load->view('_layout_main', $this->data);			
						} else {
							$array = array(
								"project_title" => $this->input->post("project_title"),
								"project_deadline" => $this->input->post("project_deadline"),
								"project_description" => $this->input->post("project_description"),
								"project_create_date" => $this->input->post("project_create_date"),
								"project_percentage" => 0,
								"project_status" => 'in progress',
								"project_client_name" => $data['client']->name,
							);
							$this->project_m->update_project($array, $id);
							redirect(base_url("project/index"));
						}
					} else {
						// Load view
						$this->data["subview"] = "project/edit";
						$this->load->view('_layout_main', $this->data);
					}
				} else {
					redirect(base_url('project/index;'));
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

	public function view() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		$userID = $this->session->userdata('userID');
		if((int)$id) {
			$time = 0;
			$this->data['project'] = $this->project_m->get_project($id);
			$this->data['grouptask'] = $this->grouptasks_m->get_order_by_grouptasks(array("project_id"=>$id));
			$this->data['grouptask_list'] = $this->grptaskslist_m->get_grptaskslist();
			$this->data['all_tasks'] = $this->project_m->get_project_task($id);
			$alltimes = $this->timetracker_m->get_order_by_timetracker(array('projectID' => $id));
			if(count($alltimes)) {
				foreach ($alltimes as  $alltime) {
					$time += $alltime->timehour;
				}
				$this->data['time'] = $time;
			} else {
				$this->data['time'] = $time;
			}

			if ($this->session->userdata('usertype')=="Admin" || $this->session->userdata('usertype')=="Project manager") {
				$this->data['tasks'] = $this->project_m->get_project_task($id);
				$this->data['complete_tasks'] = $this->project_m->get_project_task_complete($id);
			} elseif ($this->session->userdata('usertype')=="User") {
				$this->data['tasks'] = $this->project_m->get_user_tasks($id);
				$this->data['complete_tasks'] = $this->project_m->get_project_task_complete($id);
			}
			
			$this->data['users'] = $this->user_m->get_order_by_user(array('usertype'=>'User'));
			if (count($this->data['all_tasks'])!=0) {
				$this->data['project_progress'] = ceil((100/count($this->data['all_tasks']))*count($this->data['complete_tasks']));
			} else {
				$this->data['project_progress'] = 0;
			}
			if ($this->data['project']) {	
				$this->data['client'] = $this->user_m->get_user($this->data['project']->project_client_id);		
				$this->data["subview"] = "project/view";
				$this->load->view('_layout_main', $this->data);	
			} else {
				redirect(base_url('project/index'));
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}	
	}
	public function delete() {

		$usertype = $this->session->userdata("usertype");

		if($usertype == "Admin" || $usertype == "Project manager") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->project_m->delete_project($id);
				redirect(base_url("project/index"));
			} else {
				redirect(base_url("project/index"));
			}	
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	/* Add task..*/
	public function add_task() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "Project manager") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				if($_POST) {
					$rules = $this->task_rules();
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data['form_validation'] = validation_errors(); 
						$this->session->set_flashdata('error_task', $this->data['form_validation']);
						redirect(base_url("project/view/$id"));
					} else {
						
						$array = array(
							"project_id" => $id,
							"task_title" => $this->input->post("title"),
							"description" => $this->input->post("description"),
							"status" => 0,
						);					
						$this->project_m->insert_project_task($array);
						$task_id = $this->db->insert_id();
						$userID = $this->input->post('userID');
				    	foreach($userID as $uid){
				    		$data = array(
							   'task_id' => $task_id,
							   'user_id' => $uid ,
							   'date' => date('Y-m-d')
							);
							$this->db->insert('task_user', $data); 
				    	}
						$this->session->set_flashdata('success_task', "Congratulation! New task added!");
						redirect(base_url("project/view/$id"));
					}
				} else {
					redirect(base_url('project/view/$id'));
				}
			}	else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function change_status() {
		$usertype = $this->session->userdata("usertype");
		if($usertype){
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			$url = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {			
				$this->data['single'] = $this->project_m->get_single_task($id);
				$array = array();
				if ($this->data['single']->status == 0) {
					$array['status'] = 1;
				} else {
					$array['status'] = 0;
				}
				$this->tasks_m->update_tasks($array, $id);
				redirect(base_url('project/view/'.$url));
			} else {
				$this->data["subview"] = "error";
				$this->load->view('_layout_main', $this->data);
			}	
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

	public function delete_task() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin" || $usertype == "Project manager") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(4)));
			$url = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->tasks_m->delete_tasks($id);
				$query = $this->db->get_where('grptaskslist', array('tasksID' => $id));
				if (count($query->result())!=0) {
					$this->db->where('tasksID', $id);
					$this->db->delete('grptaskslist'); 
				}				
				redirect(base_url('project/view/'.$url));
			} else {
				redirect(base_url('project/view/'.$url));
			}	
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}


}
/* End of file project.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/project.php */