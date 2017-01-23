<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Login extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("login_m");
	}
	protected function rules() {
		$rules = array(
				 array(
					'field' => 'username', 
					'label' => "Username",
					'rules' => 'trim|required|max_length[40]|xss_clean'
				), 
				array(
					'field' => 'password', 
					'label' => "Password",
					'rules' => 'trim|required|max_length[40]|xss_clean'
				)
			);
		return $rules;
	}

	protected function rules_cpassword() {
		$rules = array(
				array(
					'field' => 'old_password', 
					'label' => "Old Password",
					'rules' => 'trim|required|max_length[40]|min_length[4]|xss_clean|callback_old_password_unique'
				), 
				array(
					'field' => 'new_password', 
					'label' => "New Password",
					'rules' => 'trim|required|max_length[40]|min_length[4]|xss_clean'
				), 
				array(
					'field' => 're_password', 
					'label' => "Re-Password",
					'rules' => 'trim|required|max_length[40]|min_length[4]|matches[new_password]|xss_clean'
				)
			);
		return $rules;
	}
	public function index() {
		$this->login_m->loggedin() == FALSE || redirect(base_url('dashboard/index'));
		$this->data['form_validation'] = 'No';
		if($_POST) {
			$rules = $this->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data['form_validation'] = validation_errors();
				$this->data["subview"] = "login/index";
				$this->load->view('_layout_login', $this->data);			
			} else {
				if($this->login_m->login() == TRUE) {
					redirect(base_url('dashboard/index'));
				} else {
					$this->session->set_flashdata("errors", "That user does not login");
					$this->data['form_validation'] = "Incorrect login!";
					$this->data["subview"] = "login/index";
					$this->load->view('_layout_login', $this->data);
				}
			}
		} else {
			// Load view
			$this->data["subview"] = "login/index";
			$this->load->view('_layout_login', $this->data);
		}
	}

	public function change_password() {
		$usertype = $this->session->userdata('usertype');
		if ($usertype) {
			$this->data['success'] = "no";
			$this->load->library("session");
			if($_POST) {
				$rules = $this->rules_cpassword();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data["subview"] = "login/change_password";
					$this->load->view('_layout_main', $this->data);
				} else {
					$this->data['success'] = "Success";
					$this->data["subview"] = "login/change_password";
					$this->load->view('_layout_main', $this->data);
				}
			} else {
				$this->data["subview"] = "login/change_password";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	function old_password_unique() {
		if($this->login_m->change_password() == TRUE) {
			return TRUE;
		} else {
			$this->form_validation->set_message("old_password_unique", "%s does not match");
			return FALSE;
		}	
	}
	public function logout() {
		$this->login_m->logout();
		redirect(base_url("login/index"));
	}
	public function lol_username($std) {
		$id = $this->uri->segment(3);
		if($id) {
			$tables = array('settings' => 'settings');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->customer_m->get_username($table, array("username" => $this->input->post('username'), $table."ID !=" => $id ));
				if(count($user)) {
					$this->form_validation->set_message("lol_username", "%s already exists");
					$array['permition'][$i] = 'no';
				} else {
					$array['permition'][$i] = 'yes';
				}
				$i++;
			}
			if(in_array('no', $array['permition'])) {
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			$tables = array('settings' => 'settings');
			$array = array();
			$i = 0;
			foreach ($tables as $table) {
				$user = $this->customer_m->get_username($table, array("username" => $this->input->post('username')));
				if(count($user)) {
					$this->form_validation->set_message("lol_username", "%s already exists");
					$array['permition'][$i] = 'no';
				} else {
					$array['permition'][$i] = 'yes';
				}
				$i++;
			}
			if(in_array('no', $array['permition'])) {
				return FALSE;
			} else {
				return TRUE;
			}
		}			
	}
}
