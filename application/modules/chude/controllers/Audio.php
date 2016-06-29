<?php 
	
	class Audio extends MY_Controller {


		public function __construct() {
			parent::__construct();
			$this->load->helper(array('form', 'url')); 
			$this->load->library(array('session', 'form_validation')); 
			$this->load->model(array('audio_model', 'chude/chude_model', 'theloai/theloai_model'));
            $this->auth->checkAuthentication();
		}

		public function upload(){ 
	        // $a_Data['b_CheckUpload'] = $b_Check;
	        // $this->load->view('file-template', $a_Data);

	        if ($this->input->post('submit')) {
                /* Post data */
                $data= array(
                    'id_bai' => $this->input->post('id_bai'),
                    'id_theloai' => $this->input->post('id_theloai'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Bài', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_rules('id_theloai', 'Thể loại', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_message('is_natural_no_zero', 'Bạn vẫn chưa chọn %s !');

				$album_dir = 'uploads/audio/'; 

				$config['upload_path'] = $album_dir; 
				$config['allowed_types'] = 'jpg|png|jpeg|gif|mp3';
				$config['max_size'] = 5120;
				$this->load->library('upload', $config); 
				$this->upload->initialize($config);
				$image = $this->upload->do_upload("file");
				
				$image_data = $this->upload->data();
					

                if ($this->form_validation->run()) {
                	if($image) {
                        /* Insert data & get message flag */
                        $data['audio'] = $album_dir . $image_data["file_name"];
                        $flag = $this->audio_model->insert($data);
                        $this->session->set_flashdata('message', $flag);
                        redirect('chude/chude/view');    
                    } else {
                        $data['data']['error'] = 'Bạn vẫn chưa chọn file phù hợp';
                    }
                    
                    $this->output->enable_profiler(true);
                }
            }
            $data['data']['dropdown_theloai'] = $this->theloai_model->dropdown();
            $data['data']['dropdown_bai'] = $this->chude_model->dropdown();
            // print_r($data);die;
            $data['template'] = 'chude/audio/add';
            $data['meta_title'] = 'Thêm mới audio';
            $data['meta_description'] = 'Thêm mới';
            $data['title_module'] = 'Audio';	
            $data['sub_title_module'] = 'Thêm mới';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }  

        // public function checkID() {
        //     $param['where'] => array('id_bai' => );
        // 	$view = $this->load->get_row();
        // }

        public function view() {
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));
            $data['data']['table'] = $this->chude_model->view();
            $data['template'] = 'chude/audio/view';
            $data['meta_title'] = 'Thêm mới bài - chủ đề';
            $data['meta_description'] = 'Thêm mới bài - chủ đề';
            $data['title_module'] = 'Bài - chủ đề';
            $data['sub_title_module'] = 'Danh sách bài - chủ đề';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }
	}



?>