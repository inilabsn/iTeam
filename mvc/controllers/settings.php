<?php

class Settings extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('setting_m');
		$language = $this->session->userdata('lang');
		$this->lang->load('setting', $language);
	}

	protected function rules() {
		$rules = array(
			array(
				'field' => 'sitename', 
				'label' => $this->lang->line("sitename"), 
				'rules' => 'trim|required|xss_clean|max_length[128]'
			),
			array(
				'field' => 'name', 
				'label' => $this->lang->line("name"), 
				'rules' => 'trim|required|xss_clean|max_length[40]'
			),
			array(
				'field' => 'email', 
				'label' => $this->lang->line("email"), 
				'rules' => 'trim|max_length[40]|valid_email|xss_clean'
			),
			array(
				'field' => 'phone', 
				'label' => $this->lang->line("phone"), 
				'rules' => 'trim|max_length[25]|xss_clean'
			),
			array(
				'field' => 'address', 
				'label' => $this->lang->line("address"), 
				'rules' => ''
			),
			array(
				'field' => 'currency', 
				'label' => $this->lang->line("currency"), 
				'rules' => 'required|xss_clean|max_length[4]'
			)		
		);
		return $rules;
	}

	public function index ()
	{
		// Fetch all setting
		$usertype = $this->session->userdata("usertype");
		$userID = array_shift($this->session->userdata("userID"));
		$this->data['setting'] = $this->setting_m->get_setting(1);
		
		if($usertype == "Admin") {
			if($_POST) {
					$rules = $this->rules();
					// unset($rules[5], $rules[6], $rules[7]);
					$this->form_validation->set_rules($rules);
					if ($this->form_validation->run() == FALSE) {
						$this->data['form_validation'] = validation_errors(); 
						$this->data["subview"] = "setting/edit";
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
								$this->data["subview"] = "setting/edit";
								$this->load->view('_layout_main', $this->data);
							} else {
								$data = array("upload_data" => $this->upload->data());
								$this->setting_m->update_setting($array, $userID);
								redirect(base_url("settings/index"));
							}
						} else {
							$this->setting_m->update_setting($array, $userID);
							redirect(base_url("settings/index"));
						}
					}
			} else {
				$this->data["subview"] = "setting/edit";
				$this->load->view('_layout_main', $this->data);
			}
		} else {
			$this->data["subview"] = "error";
			$this->load->view('_layout_main', $this->data);
		}
	}

}