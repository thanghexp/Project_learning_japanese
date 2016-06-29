<?php 

class Vidu_kanji_nangcao extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url')); 
        $this->load->model(array('vidu_tuvung_model'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->module('backend_user/auth');
	}


    public function add() { 
        $this->auth->checkAuthentication();
		$id_encode = $this->input->get('id');
		$id        = $this->encrypt->decode(base64_decode($id_encode));
        if ($this->input->post('submit')) {
            /* Post data */
             $data = array(
					'noidung_vidu'      => $this->input->post('noidung_vidu'),
					'noidung_tiengnhat' => $this->input->post('noidung_tiengnhat'),
					'nghia'             => $this->input->post('nghia'),
					'id_tuvung'         => $id
             );
             // echo $this->input->post('file'); die;

           /* Form Validation */
            $this->form_validation->set_rules('noidung_vidu', 'Id_bai', 'trim|required');
            $this->form_validation->set_rules('noidung_tiengnhat', 'Kunyomi', 'trim|required');
            $this->form_validation->set_rules('nghia', 'Nghĩa', 'trim|required');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

            if ($this->form_validation->run()) {
					/* Insert data & get message flag */
					$flag            = $this->vidu_tuvung_model->insert($data);
					$this->session->set_flashdata('message', $flag);
                    redirect('tuvung/vidu_tuvung/view?id=' . $id_encode);    
            }
        }
        $data['template']         = 'tuvung/vidu_tuvung/add';
        $data['meta_title']       = 'Từ vựng';
        $data['meta_description'] = 'Thêm mới ví dụ từ vựng';
        $data['title_module']     = 'Từ vựng';
        $data['sub_title_module'] = 'Thêm mới ví dụ từ vựng';
        $this->template->call_admin_template(isset($data) ? $data : null);
    }  

    public function edit() {
        $this->auth->checkAuthentication();
    	$id_tuvung = $this->input->get('id_tuvung');	
    	$id_encode = $this->input->get('id');
    	$id        = $this->encrypt->decode(base64_decode($id_encode));
        if ($this->input->post('submit')) {
            /* Post data */
             $data['data'] = array(
					'noidung_vidu'      => $this->input->post('noidung_vidu'),
					'noidung_tiengnhat' => $this->input->post('noidung_tiengnhat'),
					'nghia'             => $this->input->post('nghia'),
             );
             // echo $this->input->post('file'); die;

           /* Form Validation */
            $this->form_validation->set_rules('noidung_vidu', 'Ví dụ', 'trim|required');
            $this->form_validation->set_rules('noidung_tiengnhat', 'Tiếng nhật', 'trim|required');
            $this->form_validation->set_rules('nghia', 'Nghĩa', 'trim|required');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

            if ($this->form_validation->run()) {
					/* Insert data & get message flag */
					$data['where'] = array('id' => $id);
					$flag          = $this->vidu_tuvung_model->update($data);
					$this->session->set_flashdata('message', $flag);
                    redirect('tuvung/vidu_tuvung/view?id=' . $id_tuvung);    
            }
        }
            
        $data['data']['row']      = $this->vidu_tuvung_model->get_row(array('where' => array('id' => $id)));
        $data['template']         = 'tuvung/vidu_tuvung/edit';
        $data['meta_title']       = 'Cập nhật';
        $data['meta_description'] = 'Cập nhật';
        $data['title_module']     = 'Ví dụ từ vựng';  
        $data['sub_title_module'] = 'Cập nhật';
        $this->template->call_admin_template(isset($data) ? $data : null);
}

    public function delete($id = null) {
        $this->auth->checkAuthentication();
    	$id_tuvung = $this->input->get('id_tuvung');	
    	$id_encode = $this->input->get('id');
    	$id        = $this->encrypt->decode(base64_decode($id_encode));
    	
        $param['where'] = array('id' => $id);
        $flag           = $this->vidu_tuvung_model->delete($param);
        $this->session->set_flashdata('message', $flag);
        redirect('tuvung/vidu_tuvung/view?id=' . $id_tuvung);    
        $this->output->enable_profiler(true);
    }

    public function view() {
        $this->auth->checkAuthentication();
    	$id_encode = $this->input->get('id');
		$id                       = $this->encrypt->decode(base64_decode($id_encode));
		$param['select']		  = 'vidu_tuvung.id as id, noidung_tiengnhat, noidung_vidu, vidu_tuvung.nghia';
		$param['where']           = array('id_tuvung' => $id);
		$param['join_table']      = array('tuvung' => 'tuvung.id = vidu_tuvung.id_tuvung');
		$data['data']['table']    = $this->vidu_tuvung_model->view($param);
		$data['template']         = 'tuvung/vidu_tuvung/view';
		$data['meta_title']       = 'Xem danh sách';
		$data['meta_description'] = 'Xem danh sách';
		$data['title_module']     = 'Ví dụ từ vựng';
		$data['sub_title_module'] = 'Xem danh sách';
		$data['data']['id_encode'] = $id_encode;
        $this->template->call_admin_template(isset($data) ? $data : null);
    }

    public function json_data_kanji() {
        $data = $this->vidu_tuvung_model->view();
        return json_encode($data, true);
    }

    public function json_data_examplekanji() {
        $id           = $this->input->get('id');
        if(isset($id)) {
            $param['where'] =  array('id_tuvung' => $id, 'loai' => 2);
            $data           = $this->vidu_tuvung_model->view($param);
            echo json_encode($data, true);
            // $this->output->enable_profiler(true);
        }
        
    }
    
}