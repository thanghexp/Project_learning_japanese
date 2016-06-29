<?php

    class Cauhoi extends MY_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('cauhoi_model', 'chude/chude_model', 'cauhoi/dapan_model'));
            $this->load->library('session');
            $this->load->module('backend_user/auth');
            
        }

        public function add() {
            $this->auth->checkAuthentication();
            /* Post data */
            $data = array(
                'id_bai'   => $this->input->post('id_bai'),
                'noidung'  => $this->input->post('noidung'),
                'img'      => $this->input->post('img'),
                'luyenthi' => $this->input->post('luyenthi'),
            );

            if ($this->input->post('submit')) {

                /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Id_bai', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_rules('noidung', 'Nội dung', 'trim|required');
                $this->form_validation->set_message('is_natural_no_zero', 'Chưa chọn chủ đề !');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                
                $dapandung = $this->input->post('dapandung');

                if(count($dapandung) >= 2 || count($dapandung) == 0) {
                    $message = array('type' => 'error', 'message' => 'Bạn phải chọn duy nhất 1 đáp án đúng !');
                    $this->session->set_flashdata('message', $message);
                } else {

                     if ($this->form_validation->run($this)) {
                        # INSERT QUESTION DATA
                        $data_cauhoi = array(
                                        'id_bai' =>$this->input->post('id_bai'),
                                        'noidung' =>$this->input->post('noidung')
                                    );

                        /* Insert data & get message flag */
                        $flag    = $this->cauhoi_model->insert($data_cauhoi);
                        $message = array('type' => 'success', 'message' => 'Thêm mới thành công !');
                        $this->session->set_flashdata('message', $message);
                        

                        $data_dapan['id'] = $flag;

                        if(isset($flag)) {
                            
                            $data_dapan = array(
                                'dapan'     => $this->input->post('dapan'),   
                                'dapandung' => $this->input->post('dapandung')
                            );

                            $i = 0;
                            for($i = 0 ;$i < count($data_dapan['dapan']); $i++) {
                                $temp['dapan']     = $data_dapan['dapan'][$i+1];
                                $temp['dapandung'] = isset($data_dapan['dapandung'][$i+1][0]) ? $data_dapan['dapandung'][$i+1][0] : '';
                                $temp['id_cauhoi'] = $flag;
                                // print_r($temp);die;
                                $this->dapan_model->insert($temp);    
                            }

                            $this->output->enable_profiler(true);
                            redirect('cauhoi/cauhoi/view');
                        }

                    }

                }

            }
            $where = array('loai' => 4);
            $data['data']['dropdown'] = $this->chude_model->dropdown($where);
            $data['template']         = 'cauhoi/cauhoi/add';
            $data['meta_title']       = 'Câu hỏi';
            $data['meta_description'] = 'Thêm mới câu hỏi';
            $data['title_module']     = 'Câu hỏi';
            $data['sub_title_module'] = 'Thêm mới câu hỏi';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function edit() {
                $this->auth->checkAuthentication();
                $id = $this->encrypt->decode(base64_decode($this->input->get('id')));

               if ($this->input->post('submit')) {

                    /* Form Validation */
                    $this->form_validation->set_rules('id_bai', 'Id_bai', 'trim|required|is_natural_no_zero');
                    $this->form_validation->set_rules('noidung', 'Nội dung', 'trim|required');
                    $this->form_validation->set_message('is_natural_no_zero', 'Chưa chọn chủ đề !');
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                    
                    $dapandung = $this->input->post('dapandung');

                     if ($this->form_validation->run($this)) {
                        # INSERT QUESTION DATA
                        $data_cauhoi['data'] = array(
                                        'id_bai' =>$this->input->post('id_bai'),
                                        'noidung' =>$this->input->post('noidung')
                                    );
                        /* Insert data & get message flag */
                        $data_cauhoi['where'] = array('id' => $id);
                        $flag    = $this->cauhoi_model->update($data_cauhoi);
                        $this->session->set_flashdata('message', $flag);
                        
                        $data_dapan['id'] = $flag;

                        if(isset($flag)) {
                            $this->output->enable_profiler(true);
                            redirect('cauhoi/cauhoi/view');
                        }

                    }

                }
                
                $data['data']['dropdown'] = $this->chude_model->dropdown();
                $data['data']['row'] = $this->cauhoi_model->get_row(array('where' => array('id' => $id)));
                $data['template']         = 'cauhoi/cauhoi/edit';
                $data['meta_title']       = 'Cập nhật từ vựng';
                $data['meta_description'] = 'Cập nhật từ vựng';
                $data['title_module']     = 'Từ vựng';  
                $data['sub_title_module'] = 'Cập nhật từ vựng';
                $this->template->call_admin_template(isset($data) ? $data : null);
         }

        public function delete() {
            $this->auth->checkAuthentication();
            $id = $this->encrypt->decode(base64_decode($this->input->get('id')));
            $param['where'] = array('id' => $id);
            $flag = $this->cauhoi_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            redirect('cauhoi/cauhoi/view');
            $this->output->enable_profiler(true);
        }

        public function view() {
            $this->auth->checkAuthentication();
            $param['select'] = 'cauhoi.id as id, ten, noidung, img, luyenthi';
            $param['join_table']      = array('bai_chude' => 'bai_chude.id = cauhoi.id_bai');
            $param['where']  = array('loai' => 4);
            $data['data']['table']    = $this->cauhoi_model->view($param);
            $data['template']         = 'cauhoi/cauhoi/view';
            $data['meta_title']       = 'Xem danh sách từ vựng';
            $data['meta_description'] = 'Xem danh sách từ vựng';
            $data['title_module']     = 'Từ vựng';
            $data['sub_title_module'] = 'Xem danh sách từ vựng';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function json_data_cauhoi_test($id_bai) {
            $param['where'] = array( 'id_bai' => $id_bai);
            $data = $this->cauhoi_model->view($param);
            shuffle($data); 
            echo json_encode($data, true);
             // $this->output->enable_profiler(true);
        }
        

        public function json_count_cauhoi($id_bai) {
            $param['where'] = array( 'id_bai' => $id_bai);
            $data = $this->cauhoi_model->count_result($param);
            echo json_encode($data, true);
            // $this->output->enable_profiler(true);
        }

        public function json_data_cauhoi_row($id_cauhoi) {
            $param['where'] = array( 'id' => $id_cauhoi);
            $data = $this->cauhoi_model->get_row($param);
            echo json_encode($data, true);
             // $this->output->enable_profiler(true);
        }

        

    }
    