<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {

	function __construct() {

		parent::__construct();
		if ($this->config->item('installed') != 'no')
		{
			show_404();
		}
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('html');
	}

	protected function rules_database() {
		$rules = array(
				array(
					'field' => 'host', 
					'label' => 'host', 
					'rules' => 'trim|required|max_length[255]|xss_clean'
				),
				array(
					'field' => 'database', 
					'label' => 'database', 
					'rules' => 'trim|required|max_length[255]|xss_clean|callback_database_unique'
				),
				array(
					'field' => 'user', 
					'label' => 'user', 
					'rules' => 'trim|required|max_length[255]|xss_clean'
				),
				array(
					'field' => 'password', 
					'label' => 'password', 
					'rules' => 'trim|max_length[255]|xss_clean'
				)
			);
		return $rules;
	}

	protected function rules_timezone() {
		$rules = array(
				array(
					'field' => 'timezone', 
					'label' => 'timezone', 
					'rules' => 'trim|required|max_length[255]|xss_clean|callback_index_validation'
				)
			);
		return $rules;
	}

	protected function rules_site() {
		$rules = array(
				array(
					'field' => 'sname', 
					'label' => 'Site Name', 
					'rules' => 'trim|required|max_length[40]|xss_clean'
				),
				array(
					'field' => 'phone', 
					'label' => 'Phone', 
					'rules' => 'trim|required|max_length[25]|xss_clean'
				),
				array(
					'field' => 'email', 
					'label' => 'Email', 
					'rules' => 'trim|required|max_length[40]|xss_clean|valid_email'
				),
				array(
					'field' => 'adminname', 
					'label' => 'Admin Name', 
					'rules' => 'trim|required|max_length[40]|xss_clean'
				),
				array(
					'field' => 'username', 
					'label' => 'Username', 
					'rules' => 'trim|required|max_length[40]|xss_clean'
				),
				array(
					'field' => 'password', 
					'label' => 'Password', 
					'rules' => 'trim|required|max_length[40]|xss_clean'
				),
			);
		return $rules;
	}

	function index() {
		$this->data['errors'] = array();
		$this->data['success'] = array();

		// Check PHP version
		if (phpversion() < "5.3") {
			$this->data['errors'][] = 'You are running PHP old version!';
		} else {
			$phpversion = phpversion();
			$this->data['success'][] = ' You are running PHP '.$phpversion;
		}
		// Check Mcrypt PHP exention
		if(!extension_loaded('mcrypt')) {
			$this->data['errors'][] = 'Mcriypt PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'Mcriypt PHP exention loaded!';
		}
		// Check Mysql PHP exention
		if(!extension_loaded('mysql')) {
			$this->data['errors'][] = 'Mysql PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'Mysql PHP exention loaded!';
		}
		// Check Mysql PHP exention
		if(!extension_loaded('mysqli')) {
			$this->data['errors'][] = 'Mysqli PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'Mysqli PHP exention loaded!';
		}
		// Check MBString PHP exention
		if(!extension_loaded('mbstring')) {
			$this->data['errors'][] = 'MBString PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'MBString PHP exention loaded!';
		}
		// Check GD PHP exention
		if(!extension_loaded('gd')) {
			$this->data['errors'][] = 'GD PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'GD PHP exention loaded!';
		}
		// Check CURL PHP exention
		if(!extension_loaded('curl')) {
			$this->data['errors'][] = 'CURL PHP exention unloaded!';
		} else {
			$this->data['success'][] = 'CURL PHP exention loaded!';
		}
		// Check Config Path
		if (@include($this->config->config_path)) { 
			$this->data['success'][] = 'Database file is loaded';
			@chmod($this->config->config_path, FILE_WRITE_MODE);
			if(is_really_writable($this->config->config_path) == TRUE) {
				$this->data['success'][] = 'Config PHP exention loaded!';
			} else {
				$this->data['errors'][] = 'Config PHP exention unloaded!';
			}
		} else {
			$this->data['errors'][] = 'Config file is unloaded';
		}
		// Check Database Path
		if (@include($this->config->database_path)) { 
			$this->data['success'][] = 'Database file is loaded';
			@chmod($this->config->database_path, FILE_WRITE_MODE);
			if (is_really_writable($this->config->database_path) === FALSE) {
				$this->data['errors'][] = 'database file is unwritable';
			} else {
				$this->data['success'][] = 'Database file is writable';
			}

		} else {
			$this->data['errors'][] = 'Database file is unloaded';
		}

		if (count($this->data['errors']) == 0) {
			$this->data["subview"] = "install/index";
			$this->load->view('_layout_install', $this->data);
		} else {
			$this->data["subview"] = "install/index";
			$this->load->view('_layout_install', $this->data);
		}
	}

	function database() {		
		if($_POST) {
			$rules = $this->rules_database();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data["subview"] = "install/database";
				$this->load->view('_layout_install', $this->data);			
			} else {
				redirect(base_url("install/timezone"));
			}
		} else {
			$this->data["subview"] = "install/database";
			$this->load->view('_layout_install', $this->data);
		}
	}

	function timezone() {
		if($_POST) {
			$rules = $this->rules_timezone();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				dump(validation_errors());
				$this->data["subview"] = "install/timezone";
				$this->load->view('_layout_install', $this->data);			
			} else {
				redirect(base_url("install/site"));
			}
		} else {
			$this->data["subview"] = "install/timezone";
			$this->load->view('_layout_install', $this->data);
		}

	}

	function site() {
		if($_POST) {
			unset($this->db);
			$rules = $this->rules_site();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->data["subview"] = "install/site";
				$this->load->view('_layout_install', $this->data);			
			} else {
				$this->load->helper('form');
				$this->load->helper('url');
				$this->load->model('install_m');
				$array = array(
					'sitename' => $this->input->post("sname"),
					'phone' => $this->input->post("phone"),
					'email' => $this->input->post("email"),
					'name' => $this->input->post("adminname"),
					'address' => $this->input->post("address"),
					'username' => $this->input->post("username"),
					'password' => $this->install_m->hash($this->input->post("password")),
					'usertype' => 'Admin',
					'photo' => 'site.png',
					'currency' => $this->input->post('currency'),
				);


				$select = $this->install_m->select_setting();
				if(count($select)) {
					$update = $this->install_m->update_setting($array, 1);
					if($update == TRUE) {
						$this->load->library('session');
						$sesdata= array(
		                   	'username'  => $this->input->post('username'),
		                   	'password'  => $this->input->post('password'),
		               	);

						$this->session->set_userdata($sesdata);
						redirect(base_url("install/done"));
					}
				} else {
					$insert = $this->install_m->insert_setting($array);
					if($insert == TRUE) {
						$this->load->library('session');
						$sesdata= array(
		                   	'username'  => $this->input->post('username'),
		                   	'password'  => $this->input->post('password'),   
		               	);

						$this->session->set_userdata($sesdata);
						redirect(base_url("install/done"));
					}
				}
			}
		} else {
			$this->data["subview"] = "install/site";
			$this->load->view('_layout_install', $this->data);
		}
	}

	function done() {
		if($_POST) {
			$this->config->config_update(array("installed" => 'Yes'));
			@chmod($this->config->database_path, FILE_READ_MODE);
			@chmod($this->config->config_path, FILE_READ_MODE);
			$this->load->library('session');
			$this->session->sess_destroy();
			redirect(base_url("login/index"));
		} else {
			$this->load->library('session');
			$this->data["subview"] = "install/done";
			$this->load->view('_layout_install', $this->data);
		}
	}

	function database_unique() {
		$config_db = array();
		$config_db['hostname'] = $this->input->post('host');
		$config_db['username'] = $this->input->post('user');
		$config_db['password'] = $this->input->post('password');
		$config_db['database'] = $this->input->post('database');
		$config_db['dbdriver'] = 'mysql';

		$this->config->db_config_update($config_db);
		unset($this->db);
		$config_db['db_debug'] = FALSE;	
		$this->load->database($config_db);
		$this->load->dbutil();

		if ($this->dbutil->database_exists($this->db->database)) {
			return TRUE;
		}
		else {
			$this->load->dbforge();
			if ($this->dbforge->create_database($this->db->database)) {
				$id = uniqid();
				$encryption_key = md5("CSM".$id);
				$this->config->config_update(array('encryption_key'=> $encryption_key));
				$this->load->model('install_m');
				$this->install_m->use_sql_string();
				return TRUE;
			}
			else {	
				$this->form_validation->set_message("database_unique", "%s can not create");
				return FALSE;
			}
		}	
	}

	function index_validation() {
		$timezone = $this->input->post('timezone');
		@chmod($this->config->index_path, 0777);
		if (is_really_writable($this->config->index_path) === FALSE) {
			$this->form_validation->set_message("index_validation", "Index file is unwritable");
			return FALSE;
		} else {
			$file = $this->config->index_path;
			$current = file_get_contents($file);
			$current = "<?php \ndate_default_timezone_set('". $timezone ."');\n?>\n".$current;
			if(file_put_contents($file, $current)) {
				@chmod($this->config->index_path, 0644);
				return TRUE;
			}
		}
	}
}

/* End of file install.php */
/* Location: ./application/controllers/install.php */