<?php
class Home extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['template'] = 'admin/index';
		$data['meta-title'] = 'Trang chủ';
		$data['meta-description'] = 'Trang chủ';
		$this->template->call_home_template(isset($data)?$data:null);
	}
        
    public function chucai() {
        $this->load->module('chucai');
        $this->chucai->show();             
    }

    public function demo() {
    	
    }

}