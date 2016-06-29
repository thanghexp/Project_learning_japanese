<?php 

class Kiemtra extends MY_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->Model(array('Kiemtra_model', 'Chucai_model'));
		$this->load->module('backend_user/auth');

	}

	public function update() 
	{
		$this->auth->checkAuthentication();

		if($this->input->post('submit')) {

                $data = $this->input->post('data');
				$id = $this->input->post('id_chucai');
				$where['where'] = array('id' => $id);
				$row =  $this->Chucai_model->get_row($where);

				$param['id_chucai'] = $row['id'];
				$param['noidung'] = $row['phatam'];
				$this->Kiemtra_model->insert($param);


                for($i = 0; $i<count($data['noidung']);$i++) {
					$param['id_chucai'] = $this->input->post('id_chucai');
                	$param['noidung'] = $data['noidung'][$i];	
                	$this->Kiemtra_model->insert($param);
                }

				$flag = array('type' => 'success', 'message' => 'Thêm mới thành công !');
                $this->session->set_flashdata('message', $flag);
                redirect('chucai/kiemtra/update');

                $this->output->enable_profiler(true);
		}
		$data['data']['dropdown'] = $this->Kiemtra_model->dropdown();
		$data['data']['table']    = $this->Kiemtra_model->view();
        $data['template']         = 'chucai/kiemtra/update';
        $data['meta_title']       = 'Thêm mới kiểm tra';
        $data['meta_description'] = 'Thêm mới ';
        $data['title_module']     = 'Kiểm tra';
        $data['sub_title_module'] = 'Thêm mới';
        $this->template->call_admin_template(isset($data) ? $data : null);
	}

	public function json_data_dapan($id_chucai) 
	{	
		$where = array('id_chucai' => $id_chucai);
		$data = $this->Kiemtra_model->view($where);
		shuffle($data);
		echo json_encode($data, true);
	}
	
	
}