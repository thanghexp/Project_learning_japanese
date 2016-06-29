<?php defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends MX_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->library(array('MY_Form_validation'));
		$this->load->helper('url');
		$this->load->module(array('template', 'backend_user/auth'));
		$this->load->model('backend_user/auth_model');

		$this->load->library(array('form_validation', 'session', 'encrypt'));
		// $this->checkLogin();
	}

	

}