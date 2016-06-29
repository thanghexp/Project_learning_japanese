<?php
class Admin extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array(
								'Kaiwa/Kaiwa_model', 'Chude/Chude_model', 'Chucai/Vidu_model',
								'Cauhoi/Cauhoi_model', 'Cauhoi/Dapan_model', 'Nguphap/Nguphap_model',
								'Chucai/Kiemtra_model', 'Tuvung/Tuvung_model', 'Tumoi/Tumoi_model',
								'Tuvung/Vidu_tuvung_model', 'Chucai/Chucai_model', 'backend_user/Auth_model'

							));
		$this->load->module('backend_user/auth');
		$this->auth->checkAuthentication();
	}

	public function index() {
		$data['data']['auth']        = $this->Auth_model->count_result();
		$data['data']['kaiwa']       = $this->Kaiwa_model->count_result();
		$data['data']['chucai']      = $this->Chucai_model->count_result();
		$data['data']['viduchucai']  = $this->Vidu_model->count_result();
		$data['data']['tumoi']       = $this->Tumoi_model->count_result();
		$data['data']['tuvung']      = $this->Tuvung_model->count_result();
		$data['data']['nguphap']     = $this->Nguphap_model->count_result();
		$data['data']['chude']       = $this->Chude_model->count_result();
		$data['data']['question']    = $this->Cauhoi_model->count_result();
		$data['data']['dapan']       = $this->Dapan_model->count_result();
		$data['data']['vidu_tuvung'] = $this->Vidu_tuvung_model->count_result();
		$data['data']['kiemtra']     = $this->Kiemtra_model->count_result();

		foreach($data['data'] as $key => $value) {
			$labels[] = $key;
			$data_chart[] = $value;
		}


		$data['data']['labels']     = json_encode($labels);
		$data['data']['data_chart'] = json_encode($data_chart);
		$data['template']           = 'admin/index';
		$data['meta-title']         = 'Trang admin';
		$data['meta-description']   = 'Trang admin';
		$this->template->call_admin_template(isset($data)?$data:null);
	}

}