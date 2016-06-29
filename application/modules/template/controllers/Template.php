<?php
class Template extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function call_admin_template($data = null) {
		$this->load->view('Admin_template', $data);	
	}

	public function call_auth_template($data = null) {
		$this->load->view('Auth_template', $data);	
	}

	public function call_home_template($data = null) {
		$this->load->view('Home_template', $data);	
	}
}