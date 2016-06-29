<?php
class Vidu extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Vidu_model');
		$this->load->module('backend_user/auth');

	}

	public function index() {
		$this->auth->checkAuthentication();
	}

	public function add($id = null) {
		$this->auth->checkAuthentication();
		$id_encode = $this->input->get('id');
		$id = $this->encrypt->decode(base64_decode($id_encode));
		if($this->input->post('submit')) {		
			/* Post data */
 			$data['noidung'] = $this->input->post('txtNoiDung');
			$data['chuhan']  = $this->input->post('txtChuHan');
			$data['nghia']   = $this->input->post('txtNghia');

			if($data['noidung'] == null) {
				$flag = array('type' => 'error', 'message' => 'Bạn chưa nhập số ví dụ !');
				$this->session->set_flashdata('message', $flag);
			}
			
				for($i =0; $i < count($data['noidung']) ; $i++) {
					$param = array(
							'id_chucai' => $id,
							'noidung'   => $data['noidung'][$i],
							'chuhan'    => $data['chuhan'][$i],
							'nghia'     => $data['nghia'][$i]
						);
					$this->Vidu_model->insert($param);				
				}
				$flag = array('type' => 'success', 'message' => 'Thêm mới thành công !');
				$this->session->set_flashdata('message', $flag);
				redirect('chucai/vidu/view?id='. $id_encode);
		}
		
		$data['template']         = 'chucai/vidu/add';
		$data['meta_title']       = 'Thêm mới chữ cái';
		$data['meta_description'] = 'Thêm mới chữ cái';
		$data['title_module']     = 'Bảng chữ cái';
		$data['sub_title_module'] = 'Thêm mới ví dụ';
		$this->template->call_admin_template(isset($data)?$data:null);
	}

	public function edit($id = null) {
		$this->auth->checkAuthentication();
		$id_encode = $this->input->get('id');
		$id = $this->encrypt->decode(base64_decode($id_encode));
		if($this->input->post('submit')) {
			/* Post data */
			$data['noidung'] = $this->input->post('txtNoiDung');
			$data['chuhan']  = $this->input->post('txtChuHan');
			$data['nghia']   = $this->input->post('txtNghia');

			$this->form_validation->set_rules('txtNoiDung', 'Nội dung', 'trim|required');
			$this->form_validation->set_rules('txtChuHan', 'Chữ hán', 'trim|required');
			$this->form_validation->set_rules('txtNghia', 'Nghĩa', 'trim|required');

			if($this->form_validation->run($this)) {
				/* Update data & get message flag */
				$param['where'] = array('id' => $id);
				$param['data'] = $data;	
				
				$flag = $this->Vidu_model->update($param);
				$this->session->set_flashdata('message', $flag);				
				
				$param_getrow['where']    = array('id' => $id);
				$row = $this->Vidu_model->getrow($param_getrow['id_chucai']);

				redirect('chucai/vidu/view?id='. $id_encode);

				$this->output->enable_profiler(true);
			}
		}
		$param_getrow['where']    = array('id' => $id);
		$data['data']['data_row'] = $this->Vidu_model->getrow($param_getrow);
		$data['template']         = 'chucai/vidu/edit';
		$data['meta_title']       = 'Cập nhật chữ cái';
		$data['meta_description'] = 'Cập nhật chữ cái';
		$data['title_module']     = 'Bảng chữ cái';
		$data['sub_title_module'] = 'Cập nhật chữ cái';
		$this->template->call_admin_template(isset($data)?$data:null);
	}

	public function view($id = null) {
		$this->auth->checkAuthentication();
		$id_encode = $this->input->get('id');
		$id = $this->encrypt->decode(base64_decode($id_encode));
		$param['where']           = array('id_chucai' => $id);
		$data['data']['table']    = $this->Vidu_model->view($param);
		$data['template']         = 'chucai/vidu/view';
		$data['meta_title']       = 'Thêm mới chữ cái';
		$data['meta_description'] = 'Thêm mới chữ cái';
		$data['title_module']     = 'Bảng chữ cái';
		$data['sub_title_module'] = 'Danh sách ví dụ';
		$data['id_chucai']        = $id;
		$this->template->call_admin_template(isset($data) ? $data : null);
	}

	public function delete() {
		$this->auth->checkAuthentication();
		$id_chucai = $this->input->get('id_chucai');
		$id_encode = $this->input->get('id');
		$id = $this->encrypt->decode(base64_decode($id_encode));
			
		$param['where'] = array('id' => $id);
		$this->Vidu_model->delete($param);
		$flag = array('type' => 'success', 'message' => 'Thêm mới thành công !');
		$this->session->set_flashdata('message', $flag);
		redirect('chucai/vidu/view?id='. $id_chucai);
		$this->template->call_admin_template(isset($data) ? $data : null);
	}

	public function show_form_ajax() {
		// Nhập giá trị number bằn	g phương thức post
		$number = isset($_POST['number']) ? (int)$_POST['number'] : false;
		 
		if ($number<0 || $number>3) {
		    die ('<h1>Vui lòng nhập một số lớn hơn không (0) và nhỏ hơn (4)</h1>');
		}

		for ($i = 1; $i <= $number; $i++) {
			$data['tam'] = $i;
		    $this->load->view('chucai/vidu/form_ajax', $data);
		}
	}

	public function json_data_vidu() {
 		$id = $this->input->get('id');
 		$param['where'] = array('id_chucai' => $id);
        $data = $this->Vidu_model->view($param);
        $data = json_encode($data, true);
        echo $data;
    }
}