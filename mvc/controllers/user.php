<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("user_m");
		$language = $this->session->userdata('lang');
		$this->lang->load('user', $language);	
	}
	/* user index page view */
	public function index() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin"){
			// Load view
			$this->data['users'] = $this->user_m->get_user();
			$this->data["subview"] = "user/index";
			$this->load->view('_layout_main', $this->data);
		} elseif($usertype == "user" || $usertype == "user") {
			$this->data['user'] = $this->user_m->get_user();
			$this->data["subview"] = "user/index";
			$this->load->view('_layout_main', $this->data);
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}
	/* user add form rules */
	protected function rules() {
		$rules = array(
			array(
				'field' => 'name', 
				'label' => $this->lang->line("user_name"), 
				'rules' => 'trim|required|xss_clean|max_length[40]'
			),
			array(
				'field' => 'gender', 
				'label' => $this->lang->line("user_gender"), 
				'rules' => 'trim|max_length[25]|xss_clean'
			),
			array(
				'field' => 'email', 
				'label' => $this->lang->line("user_email"), 
				'rules' => 'trim|max_length[40]|valid_email|xss_clean|callback_unique_user_email'
			),
			array(
				'field' => 'phone', 
				'label' => $this->lang->line("user_phone"), 
				'rules' => 'trim|max_length[25]|xss_clean'
			), 
			array(
				'field' => 'usertype',
				'label' => $this->lang->line("user_type"), 
				'rules' => 'trim|required|max_length[40]|min_length[4]|xss_clean'
			),
			array(
				'field' => 'photo', 
				'label' => $this->lang->line("user_photo"), 
				'rules' => 'trim|max_length[200]|xss_clean'
			),
			array(
				'field' => 'username', 
				'label' => $this->lang->line("user_username"), 
				'rules' => 'trim|required|max_length[40]|xss_clean'
			),
			array(
				'field' => 'password',
				'label' => $this->lang->line("user_password"), 
				'rules' => 'trim|required|max_length[40]|min_length[4]|xss_clean'
			)
			
		);

		return $rules;

	}
	/* Adding user function */
	public function add() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin"){
			if($_POST) {
				$rules = $this->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$this->data['form_validation'] = validation_errors(); 
					dump($this->data['form_validation']);
					$this->data["subview"] = "user/add";
					$this->load->view('_layout_main', $this->data);			
				} else {
					$array = array();
					for($i=0; $i<count($rules); $i++) {
						$array[$rules[$i]['field']] = $this->input->post($rules[$i]['field']);
					}
					$array['password'] = $this->user_m->hash($this->input->post("password"));
					$new_file = "default.png";
					$date_time = date('Y-m-d H:i:s');
					$array['date_time'] = $date_time;
					if($_FILES["image"]['name'] !="") {
						$file_name = $_FILES["image"]['name'];
						$file_name_rename = rand(1, 100000000000);
			            $explode = explode('.', $file_name);
			            $new_file = $file_name_rename.'.'.$explode[1];
						$config['upload_path'] = "./uploads/images";
						$config['allowed_types'] = "gif|jpg|png";
						$config['file_name'] = $new_file;
						$config['max_size'] = '700';
						$config['max_width'] = '1024';
						$config['max_height'] = '768';
						$array['photo'] = $new_file;
						$this->load->library('upload', $config);
						if(!$this->upload->do_upload("image")) {
							$this->data["image"] = $this->upload->display_errors();
							$this->data["subview"] = "user/add";
							$this->load->view('_layout_main', $this->data);
						} else {
							$data = array("upload_data" => $this->upload->data());
							$this->user_m->insert_user($array);
							redirect(base_url("user/index"));
						}
					} else {
						$array["photo"] = $new_file;
						$this->user_m->insert_user($array);
						redirect(base_url("user/index"));
					}
				}
			} else {
				// Load view
				$this->data["subview"] = "user/add";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}

	}
	/* view details function */
	public function view() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$usertype = $this->session->userdata('usertype');
			if ($usertype) {
				$language = $this->session->userdata('lang');
				$this->data['user'] = $this->user_m->get_user($id);
				if ($this->data['user']) {
					$this->data["subview"] = "user/view";
					$this->load->view('_layout_main', $this->data);
				} else {
					redirect(base_url('user/index'));
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
	/* Edit user function*/
	public function edit() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin"){

			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				$this->data['user'] = $this->user_m->get_user($id);
				if ($this->data['user']) {
					if($_POST) {
						$rules = $this->rules();
						unset($rules[5], $rules[6], $rules[7]);
						$this->form_validation->set_rules($rules);
						if ($this->form_validation->run() == FALSE) { 
							$this->data["subview"] = "user/edit";
							$this->load->view('_layout_main', $this->data);
						} else {
							$array = array();
							for($i=0; $i<count($rules); $i++) {
								$array[$rules[$i]['field']] = $this->input->post($rules[$i]['field']);
							}
							if($_FILES["image"]['name'] !="") {
								$file_name = $_FILES["image"]['name'];
								$file_name_rename = rand(1, 100000000000);
					            $explode = explode('.', $file_name);
					            $new_file = $file_name_rename.'.'.$explode[1];
								$config['upload_path'] = "./uploads/images";
								$config['allowed_types'] = "gif|jpg|png";
								$config['file_name'] = $new_file;
								$config['max_size'] = '700';
								$config['max_width'] = '1024';
								$config['max_height'] = '768';
								$array['photo'] = $new_file;
								$this->load->library('upload', $config);
								if(!$this->upload->do_upload("image")) {
									$this->data["image"] = $this->upload->display_errors();
									$this->data["subview"] = "user/edit";
									$this->load->view('_layout_main', $this->data);
								} else {
									$data = array("upload_data" => $this->upload->data());
									$this->user_m->update_user($array, $id);
									redirect(base_url("user/index"));
								}
							} else {
								$this->user_m->update_user($array, $id);
								redirect(base_url("user/index"));
							}
						}
					} else {
						// Load view
						$this->data["subview"] = "user/edit";
						$this->load->view('_layout_main', $this->data);
					}
				} else {
					redirect(base_url('user/index'));
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
	/* Delete function */
	public function delete() {
		$usertype = $this->session->userdata("usertype");
		if($usertype == "Admin"){
			$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
			if((int)$id) {
				if($this->user_m->delete_user($id)) {
					redirect(base_url("user/index"));
				} else {
					redirect(base_url("user/index"));
				}
				
			} else {

				redirect(base_url("user/index"));

			}	

		} else {

			$this->data["subview"] = "error";

			$this->load->view('_layout_main', $this->data);

		}
	}
	/* Call back function*/
	// public function lol_username($std) {

	// 	$id = $this->uri->segment(3);

	// 	if($id) {

	// 		$tables = array('settings' => 'settings', 'user' => 'user', 'customer' => 'customer');

	// 		$array = array();

	// 		$i = 0;

	// 		foreach ($tables as $table) {

	// 			$user = $this->user_m->get_username($table, array("username" => $this->input->post('username'), $table."ID !=" => $id ));

	// 			if(count($user)) {

	// 				$this->form_validation->set_message("lol_username", "%s already exists");

	// 				$array['permition'][$i] = 'no';

	// 			} else {

	// 				$array['permition'][$i] = 'yes';

	// 			}

	// 			$i++;

	// 		}

	// 		if(in_array('no', $array['permition'])) {

	// 			return FALSE;

	// 		} else {

	// 			return TRUE;

	// 		}

	// 	} else {

	// 		$tables = array('settings' => 'settings', 'user' => 'user', 'customer' => 'customer');

	// 		$array = array();

	// 		$i = 0;

	// 		foreach ($tables as $table) {

	// 			$user = $this->user_m->get_username($table, array("username" => $this->input->post('username')));

	// 			if(count($user)) {

	// 				$this->form_validation->set_message("lol_username", "%s already exists");

	// 				$array['permition'][$i] = 'no';

	// 			} else {

	// 				$array['permition'][$i] = 'yes';

	// 			}

	// 			$i++;

	// 		}



	// 		if(in_array('no', $array['permition'])) {

	// 			return FALSE;

	// 		} else {

	// 			return TRUE;

	// 		}

	// 	}			
	// }
	public function unique_user_email() {
		$id = htmlentities(mysql_real_escape_string($this->uri->segment(3)));
		if((int)$id) {
			$email = $this->user_m->get_order_by_user(array("email" => $this->input->post("email"), "userID !=" => $id));
			if(count($email)) {
				$this->form_validation->set_message("unique_user_email", "%s already exists");
				return FALSE;
			}
			return TRUE;
		} else {
			$email = $this->user_m->get_order_by_user(array("email" => $this->input->post("email")));
			if(count($email)) {
				$this->form_validation->set_message("unique_user_email", "%s already exists");
				return FALSE;
			}
			return TRUE;
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



/* End of file user.php */

/* Location: .//E/Xampp/htdocs/ini_complain/mvc/controllers/user.php */