<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class notice extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("notice_m");
		$this->load->model("alert_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('notice', $language);	
	}
	public function index() {
		$usertype = $this->session->userdata("usertype");
		if ($usertype) {
			$this->data['notices'] = $this->notice_m->get_notice();
			$this->data["subview"] = "notice/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	protected function rules() {
		$rules = array(
				 array(
					'field' => 'title', 
					'label' => $this->lang->line("notice_title"), 
					'rules' => 'trim|required|xss_clean|max_length[128]'
				), 
				array(
					'field' => 'notice', 
					'label' => $this->lang->line("notice_notice"),
					'rules' => 'trim|required|xss_clean'
				), 
				array(
					'field' => 'date', 
					'label' => $this->lang->line("notice_date"),
					'rules' => 'trim|required|max_length[10]|xss_clean'
				)
			);
		return $rules;
	}
	public function add() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin") {
			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data['form_validation'] = validation_errors(); 
					$this->data["subview"] = "notice/add";
					$this->load->view('_layout_main', $this->data);			
				} else {
					$array = array(
						"title" => $this->input->post("title"),
						"notice" => $this->input->post("notice"),
						"date" => $this->input->post("date"),
					);
					$this->notice_m->insert_notice($array);
					redirect(base_url("notice/index"));
				}
			} else {
				// Load view
				$this->data["subview"] = "notice/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}

	}
	public function edit() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['notice'] = $this->notice_m->get_notice($id);
				if ($this->data['notice']) {
					if($_POST) {
						$rules = $this->rules();
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) {
							$this->data["subview"] = "notice/edit";
							$this->load->view('_layout_main', $this->data);			
						} else {
							$array = array(
								"title" => $this->input->post("title"),
								"notice" => $this->input->post("notice"),
								"date" => $this->input->post("date"),
							);
							$this->notice_m->update_notice($array, $id);
							redirect(base_url("notice/index"));
						}
					} else {
						// Load view
						$this->data["subview"] = "notice/edit";
						$this->load->view('_layout_main', $this->data);
					}
				} else {
					redirect(base_url('notice/index;'));
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
		if((int)$id) {
			$this->data['notice'] = $this->notice_m->get_notice($id);
			if ($this->data['notice']) {			
				$alert = $this->alert_m->get_alert_by_notic($id);
				if(!count($alert)) {
					$array = array(
						"noticeID" => $id,
						"username" => $this->session->userdata("username"),
						"usertype" => $this->session->userdata("usertype")
					);
					$this->alert_m->insert_alert($array);
					$this->data["subview"] = "notice/view";
					$this->load->view('_layout_main', $this->data);
				} else {
					// Load view
					$this->data["subview"] = "notice/view";
					$this->load->view('_layout_main', $this->data);
				}	
			} else {
				redirect(base_url('notice/index'));
			}

		} else {

			$this->data["subview"] = "error";

			$this->load->view('_layout_main', $this->data);

		}	

	}



	public function delete() {

		$usertype = $this->session->userdata("usertype");

		if($usertype == "Admin") {
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->notice_m->delete_notice($id);
				redirect(base_url("notice/index"));
			} else {
				redirect(base_url("notice/index"));
			}	
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	function date_valid($date) {
	   $ddmmyyy='(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)[0-9]{2}';
	   if(preg_match("/$ddmmyyy$/", $date)) {
	      return TRUE;
	   } else {
	     $this->form_validation->set_message("date_valid", "%s is not valid mm-dd-yyyy");
	     return FALSE;
	   }
	}

}
/* End of file notice.php */
/* Location: .//D/xampp/htdocs/school/mvc/controllers/notice.php */