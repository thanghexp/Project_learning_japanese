<?php

    class Kanji_nangcao  extends MY_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url')); 
            $this->load->model(array('Kanji_nangcao_model', 'chude/chude_model'));
            $this->load->library(array('session', 'form_validation'));
            $this->load->module('backend_user/auth');
        }

        public function add() { 
            $this->auth->checkAuthentication();
            if ($this->input->post('submit')) {
                /* Post data */
                 $data = array(
                     'id_bai'   => $this->input->post('id_bai'),
                     'kunyomi'  => $this->input->post('kunyomi'),
                     'onyomi'   => $this->input->post('onyomi'),
                     'nghia'    => $this->input->post('nghia'),
                     'amhan'    => $this->input->post('amhan'),
                     'cachviet' => $this->input->post('cachviet'),
                     'tu_kanji' => $this->input->post('tu_kanji'),
                 );
                 // echo $this->input->post('file'); die;

               /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Id_bai', 'trim|required');
                $this->form_validation->set_rules('kunyomi', 'Kunyomi', 'trim|required');
                $this->form_validation->set_rules('onyomi', 'Onyomi', 'trim|required');
                $this->form_validation->set_rules('nghia', 'Nghĩa', 'trim|required');
                $this->form_validation->set_rules('amhan', 'Âm hán', 'trim|required');
                // $this->form_validation->set_rules('hinhanh',  'Hình ảnh', 'trim|required');
                $this->form_validation->set_rules('cachviet', 'Cách viết', 'trim|required');
                $this->form_validation->set_rules('tu_kanji', 'Từ kanji', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                $album_dir = 'uploads/images/'; 

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
                        $data['hinhanh'] = $album_dir . $image_data["file_name"];
                        $flag = $this->Kanji_nangcao_model->insert($data);
                        $this->session->set_flashdata('message', $flag);
                        redirect('kanji_nangcao/kanji_nangcao/view');    
                    } else {
                        $data['data']['error'] = 'Bạn vẫn chưa chọn file phù hợp';
                    }
                    
                    // $this->output->enable_profiler(true);
                }
            }

            $where = array('loai' => 3);
            $data['data']['dropdown'] = $this->chude_model->dropdown($where);
            $data['template']         = 'kanji_nangcao/kanji_nangcao/add';
            $data['meta_title']       = 'Kanji nâng cao';
            $data['meta_description'] = 'Thêm mới';
            $data['title_module']     = 'Kanji nâng cao';
            $data['sub_title_module'] = 'Thêm mới';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }  

        public function edit() {
            $this->auth->checkAuthentication();
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_bai'   => $this->input->post('id_bai'),
                    'kunyomi'  => $this->input->post('kunyomi'),
                    'onyomi'   => $this->input->post('onyomi'),
                    'nghia'    => $this->input->post('nghia'),
                    'amhan'    => $this->input->post('amhan'),
                    'hinhanh'  => $this->input->post('hinhanh'),
                    'cachviet' => $this->input->post('cachviet'),
                    'tu_kanji' => $this->input->post('tu_kanji'),
                );

                if ($this->input->post('submit')) {

                    /* Form Validation */
                    $this->form_validation->set_rules('id_bai', 'Id_bai', 'trim|required');
                    $this->form_validation->set_rules('kunyomi', 'Kunyomi', 'trim|required');
                    $this->form_validation->set_rules('onyomi', 'Onyomi', 'trim|required');
                    $this->form_validation->set_rules('nghia', 'Nghĩa', 'trim|required');
                    $this->form_validation->set_rules('amhan', 'Âm hán', 'trim|required');
                    // $this->form_validation->set_rules('hinhanh',  'Hình ảnh', 'trim|required');
                    $this->form_validation->set_rules('cachviet', 'Cách viết', 'trim|required');
                    $this->form_validation->set_rules('tu_kanji', 'Từ kanji', 'trim|required');
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                    

                    $album_dir = 'uploads/images/'; 

                    $config['upload_path'] = $album_dir; 
                    $config['allowed_types'] = 'jpg|png|jpeg|gif|mp3';
                    $config['max_size'] = 5120;
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config);
                    $image = $this->upload->do_upload("hinhanh");
                    $image_data = $this->upload->data();



                    if ($this->form_validation->run($this)) {
                        /* Update data & get message flag */
                        if($image) {
                            /* Insert data & get message flag */
                            $param['where'] = array('id' => $id);
                            $param['data']  = $data;
                            $param['data']['hinhanh'] = $album_dir . $image_data["file_name"];
                            $flag           = $this->Kanji_nangcao_model->update($param);
                            $this->session->set_flashdata('message', $flag);
                            redirect('kanji_nangcao/kanji_nangcao/view');  
                        } else {
                            $data['data']['error'] = 'Bạn vẫn chưa chọn file phù hợp';
                        }
                        $this->output->enable_profiler(true);
                    }

                    if ($this->form_validation->run() == FALSE) {
                        $data['template'] = 'kanji_nangcao/kanji_nangcao/edit ';
                    }
                }
            }
            $where = array('loai' => 3);
            $data['data']['dropdown'] = $this->chude_model->dropdown($where);
            $data['data']['row']      = $this->Kanji_nangcao_model->get_row(array('where' => array('id' => $id)));
            $data['template']         = 'kanji_nangcao/kanji_nangcao/edit';
            $data['meta_title']       = 'Cập nhật ';
            $data['meta_description'] = 'Cập nhật';
            $data['title_module']     = 'Kanji nâng cao';  
            $data['sub_title_module'] = 'Cập nhật';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function delete() {
            $this->auth->checkAuthentication();
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));
            $param['where'] = array('id' => $id);
            $flag           = $this->Kanji_nangcao_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            redirect('kanji_nangcao/kanji_nangcao/view');
            $this->output->enable_profiler(true);
        }

        public function view() {
            $this->auth->checkAuthentication();
            $param['select']          = 'tuvung.id, kunyomi, onyomi, nghia, ten';
            $param['join_table']      = array('bai_chude' => 'bai_chude.id = tuvung.id_bai');
            $param['where']           = array('loai' => '3');
            $data['data']['table']    = $this->Kanji_nangcao_model->view($param);
            $data['template']         = 'kanji_nangcao/kanji_nangcao/view';
            $data['meta_title']       = 'Xem danh sách';
            $data['meta_description'] = 'Xem danh sách';
            $data['title_module']     = 'Kanji nâng cao';
            $data['sub_title_module'] = 'Xem danh sách';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }


        public function json_data_kanji() {
            $id_bai           = $this->input->get('id_bai');
            if(isset($id_bai)) {
                $param['where'] =  array('id_bai' => $id_bai, 'loai' => 3);
                $data           = $this->Kanji_nangcao_model->view($param);
                echo json_encode($data, true);
            }
            
        }

        public function json_data_detailKanji() {
            $id        = $this->input->get('id_tuvung');
            if(isset($id)) {
                $param['where'] = array('id' => $id);
                $data           = $this->Kanji_nangcao_model->get_row($param);
                echo json_encode($data, true);
            }

        } 

    }
    