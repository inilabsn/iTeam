<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Admin_Controller extends MY_Controller {



	function __construct ()

	{

		parent::__construct();

		$this->load->model("login_m");

		$this->load->model("site_m");

		$this->data["siteinfo"] = $this->site_m->get_site(1, "TRUE");

		$this->load->library("session");

		$this->load->helper('language');

		$this->load->helper('form');

		$this->load->library('form_validation');



		/* Alert System Start.........*/

		$this->load->model("notice_m");

		$this->load->model("alert_m");

		$this->data['all'] = array();

		$this->data['alert'] = array();

		$notices = $this->notice_m->get_notice();

		$i = 0;

		if(count($notices) >0) {

			foreach ($notices as $notice) {

				$this->data['all'][] = $this->alert_m->get_order_by_alert(array("noticeID" => $notice->noticeID, "username" => $this->session->userdata("username")));

				if(count($this->data['all'][$i]) == 0) {

					$this->data['alert'][] = $notice;

				}

				$i++;

			}

		}

		$this->data['alert'];

		/* Alert System End.........*/

		$language = $this->session->userdata('lang');
		$this->lang->load('topbar_menu', $language);



		// Cheking session

		$exception_uris = array(

			"login/index",

			"login/logout",

			"login/register",

		);



		if(in_array(uri_string(), $exception_uris) == FALSE) {

			if($this->login_m->loggedin() == FALSE) {

				redirect(base_url("login/index"));

			}

		}

	}

}



/* End of file Admin_Controller.php */

/* Location: .//D/xampp/htdocs/ini_complain/mvc/libraries/Admin_Controller.php */