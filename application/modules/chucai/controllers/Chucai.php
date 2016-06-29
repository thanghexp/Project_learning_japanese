<?php

    class Chucai extends MY_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Chucai_model');
            $this->load->library('session');
            $this->load->module('backend_user/auth');
        }

        public function add() {
            $this->auth->checkAuthentication();
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'Katakana' => $this->input->post('txtKatakana'),
                    'hiragana' => $this->input->post('txtHiragana'),
                    'phatam' => $this->input->post('phatam')
                );

                /* Form Validation */
                $this->form_validation->set_rules('txtKatakana', 'Katakana', 'trim|required');
                $this->form_validation->set_rules('txtHiragana', 'hiragana', 'trim|required');
                $this->form_validation->set_rules('phatam', 'Phát âm', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                // Insert image 
                $album_dir = 'uploads/images/'; 

                $config['upload_path'] = $album_dir; 
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 5120;
                $this->load->library('upload', $config); 
                $this->upload->initialize($config);
                $image = $this->upload->do_upload("file_image");

                $image_data = $this->upload->data();

                // Insert image 2
                $album_dir3 = 'uploads/images/'; 

                $config3['upload_path'] = $album_dir3; 
                $config3['allowed_types'] = 'jpg|png|jpeg|gif';
                $config3['max_size'] = 5120;
                $this->load->library('upload', $config3); 
                $this->upload->initialize($config3);
                $image3 = $this->upload->do_upload("file_image3");

                $image_data3 = $this->upload->data();

                // Insert audio
                $album_dir2 = 'uploads/audio/'; 

                $config2['upload_path'] = $album_dir2; 
                $config2['allowed_types'] = 'mp3';
                $config2['max_size'] = 5120;
                $this->load->library('upload', $config2); 
                $this->upload->initialize($config2);
                $audio = $this->upload->do_upload("file_audio");
                
                $audio_data = $this->upload->data();

                if ($this->form_validation->run()) {
                    if($image || $audio) {
                        /* Insert data & get message flag */
                        $data['hinhanh_cachviet_hiragana'] = $album_dir . $image_data["file_name"];
                        $data['hinhanh_cachviet_katakana'] = $album_dir3 . $image_data3["file_name"];
                        $data['phatam_audio'] = $album_dir2 . $audio_data["file_name"];
                        // print_r($data); die;
                        $flag = $this->Chucai_model->insert($data);
                        $this->session->set_flashdata('mesage', $flag);
                        redirect('chucai/view');

                    $this->output->enable_profiler(true);

                    } else {
                        $data['data']['error'] = 'Bạn vẫn chưa chọn file phù hợp';
                    }
                    
                }

            }

            $data['template']         = 'chucai/chucai/add';
            $data['meta_title']       = 'Thêm mới chữ cái';
            $data['meta_description'] = 'Thêm mới chữ cái';
            $data['title_module']     = 'Bảng chữ cái';
            $data['sub_title_module'] = 'Thêm mới chữ cái';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function edit() {
            $this->auth->checkAuthentication();
            $id = $this->encrypt->decode(base64_decode($this->input->get('id')));
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'Katakana' => $this->input->post('txtKatakana'),
                    'hiragana' => $this->input->post('txtHiragana'),
                    'phatam'   => $this->input->post('phatam')
                );

                /* Form Validation */
                $this->form_validation->set_rules('txtKatakana', 'Chữ cái Katakana', 'trim|required');
                $this->form_validation->set_rules('txtHiragana', 'Chữ cái hiragana', 'trim|required');
                $this->form_validation->set_rules('phatam', 'Phát âm', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {
                    /* Update data & get message flag */
                    $param['where'] = array('id' => $id);
                    $param['data']  = $data;
                    $flag           = $this->Chucai_model->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('chucai/view');

                    $this->output->enable_profiler(true);
                }

                if ($this->form_validation->run() == FALSE) {
                    $data['template'] = 'chucai/chucai/edit ';
                }
            }
            $data['data']['data_row'] = $this->Chucai_model->get_row(array('where' => array('id' => $id)));
            $data['template']         = 'chucai/chucai/edit';
            $data['meta_title']       = 'Cập nhật chữ cái';
            $data['meta_description'] = 'Cập nhật chữ cái';
            $data['title_module']     = 'Bảng chữ cái';
            $data['sub_title_module'] = 'Cập nhật chữ cái';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function delete() {
            $this->auth->checkAuthentication();
            $id_chucai = $this->input->get('id');
            $id_chucai = $this->encrypt->decode(base64_decode($id_chucai));
            $param['where'] = array('id' => $id_chucai);
            $flag = $this->Chucai_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            redirect('chucai/view');
            $this->output->enable_profiler(true);
        }

        public function view() {
            $this->auth->checkAuthentication();
            $data['data']['table']    = $this->Chucai_model->view();
            $data['template']         = 'chucai/chucai/view';
            $data['meta_title']       = 'Thêm mới chữ cái';
            $data['meta_description'] = 'Thêm mới chữ cái';
            $data['title_module']     = 'Bảng chữ cái';
            $data['sub_title_module'] = 'Danh sách bảng chữ cái';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        /* ANGULARJS JSON*/
        public function json_data_chucai($id = null) {
            if(isset($id)) {
                $param['where']  = array('id' => $id);
                $data = $this->Chucai_model->view(isset($param) ? $param : null);
            } else {
                $data = $this->Chucai_model->view(isset($param) ? $param : null);
                shuffle($data);
            }

            $data = json_encode($data, true);
            echo $data;
            
        }

        public function json_data_file_hinhanh($id) {
            $param['where'] = array('id' => $id);
            $param['select'] = 'hinhanh_cachviet_hiragana, phatam_audio, hinhanh_cachviet_katakana';
            $data = $this->Chucai_model->get_row($param);
            $data = json_encode($data, true);
            echo $data;
        }

        // public function json_data_file_hinhanh_kata($id) {
        //     $param['where'] = array('id' => $id);
        //     $param['select'] = 'hinhanh_cachviet_kata, phatam_audio';
        //     $data = $this->Chucai_model->get_row($param);
        //     $data = json_encode($data, true);
        //     echo $data;
            
        // }

        public function json_count_result() {
            $data = $this->Chucai_model->count_result();
            $data = json_encode($data, true);
            echo $data;
            
            
        }

    }
    