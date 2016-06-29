<?php
    class Kaiwa extends MY_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->model(array('kaiwa_model', 'chude/chude_model'));
            $this->load->module('backend_user/auth');
        }

        public function add_title() {
            $this->auth->checkAuthentication();
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_bai'           => $this->input->post('id_bai'),
                    'tieude_tiengnhat' => $this->input->post('tieude_tiengnhat'),
                    'tieude_phatam'    => $this->input->post('tieude_phatam'),
                    'tieude_nghia'     => $this->input->post('tieude_nghia'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Bài / Chủ đề', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_rules('tieude_tiengnhat', 'Tiếng nhật', 'trim|required');
                $this->form_validation->set_rules('tieude_phatam', 'Phát âm', 'trim|required');
                $this->form_validation->set_rules('tieude_nghia', 'Nghĩa', 'trim|required');
                $this->form_validation->set_message('is_natural_no_zero', 'Bạn vẫn chưa chọn %s');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $flag = $this->kaiwa_model->insert($data);
                    $this->session->set_flashdata('message', $flag);
                    redirect('kaiwa/kaiwa/view_title');

                    $this->output->enable_profiler(true);
                }
            }

            $data['data']['dropdown'] = $this->kaiwa_model->dropdown_kaiwa_chude();
            $data['template']         = 'kaiwa/kaiwa/add_title';
            $data['meta_title']       = 'Thêm mới tiêu đề kaiwa';
            $data['meta_description'] = 'Thêm mới tiêu đề kaiwa';
            $data['title_module']     = 'Kaiwa';
            $data['sub_title_module'] = 'Thêm mới tiêu đê kaiwa';
            $this->template->call_admin_template(isset($data) ? $data : null);
             $this->output->enable_profiler(true);
        }

        public function edit_title() {
            $this->auth->checkAuthentication();
            $id_kawa_decode = $this->input->get('id_kawa');
            $id_kawa = $this->encrypt->decode(base64_decode($id_kawa_decode));

            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_bai'           => $this->input->post('id_bai'),
                    'tieude_tiengnhat' => $this->input->post('tieude_tiengnhat'),
                    'tieude_phatam'    => $this->input->post('tieude_phatam'),
                    'tieude_nghia'     => $this->input->post('tieude_nghia'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Bài / Chủ đề', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_rules('tieude_tiengnhat', 'Tiếng nhật', 'trim|required');
                $this->form_validation->set_rules('tieude_phatam', 'Phát âm', 'trim|required');
                $this->form_validation->set_rules('tieude_nghia', 'Nghĩa', 'trim|required');
                $this->form_validation->set_rules('is_natural_no_zero', 'Bạn chưa chọn %s !');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $param['where'] = array('id' => $id_kawa);
                    $param['data'] = $data;
                    $flag = $this->kaiwa_model->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('kaiwa/view_title');

                    $this->output->enable_profiler(true);
                }
            }
            $data['data']['dropdown'] = $this->chude_model->dropdown();
            $data['data']['row']      = $this->kaiwa_model->get_row(array('where' => array('id' => $id_kawa)));
            $data['template']         = 'kaiwa/kaiwa/edit_title';
            $data['meta_title']       = 'Cập nhật tiêu đề kaiwa';
            $data['meta_description'] = 'Cập nhật tiêu đề kaiwa';
            $data['title_module']     = 'Kaiwa';
            $data['sub_title_module'] = 'Cập nhật tiêu đề kaiwa';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

         public function delete_title() {
            $this->auth->checkAuthentication();
            $id_kaiwa_decode = $this->input->get('id_kawa');
            $id_kawa = $this->encrypt->decode(base64_decode($id_kaiwa_decode));
            $param['where'] = array('id' => $id_kawa);
            $flag = $this->kaiwa_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            
            redirect('kaiwa/view_title');
            $this->output->enable_profiler(true);   
        }

        public function add_content() {
            $this->auth->checkAuthentication();
            $id_bai_encode = $this->input->get('id_bai');
            // echo $id_bai_encode;die;
            $id_bai = $this->encrypt->decode(base64_decode($id_bai_encode));
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_bai'           => $id_bai,
                    'noidung_tiengnhat' => $this->input->post('noidung_tiengnhat'),
                    'noidung_phatam'    => $this->input->post('noidung_phatam'),
                    'noidung_nghia'     => $this->input->post('noidung_nghia'),
                    'nguoinoi_kanji'   => $this->input->post('nguoinoi_kanji'),
                    'nguoinoi_tuhan'   => $this->input->post('nguoinoi_tuhan'),
                );

                /* Form Validation */
                
                $this->form_validation->set_rules('noidung_tiengnhat', 'Tiếng nhật', 'trim|required');
                $this->form_validation->set_rules('noidung_phatam', 'Phát âm', 'trim|required');
                $this->form_validation->set_rules('noidung_nghia', 'Nghĩa', 'trim|required');
                $this->form_validation->set_rules('nguoinoi_kanji', 'Người nói (kanji)', 'trim|required');
                $this->form_validation->set_rules('nguoinoi_tuhan', 'Người nói (từ hán)', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $flag = $this->kaiwa_model->insert($data);
                    $this->session->set_flashdata('message', $flag);
                    redirect('kaiwa/kaiwa/view_content?id_bai=' . $id_bai_encode);

                    $this->output->enable_profiler(true);
                }
            }
            $data['data']['dropdown'] = $this->chude_model->dropdown();
            $data['template']         = 'kaiwa/kaiwa/add_content';
            $data['meta_title']       = 'Thêm mới nội dung hội thoại kaiwa';
            $data['meta_description'] = 'Thêm mới nội dung hội thoại kaiwa';
            $data['title_module']     = 'Kaiwa';
            $data['sub_title_module'] = 'Thêm mới nội dung hội thoại kaiwa';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function edit_content() {
            $this->auth->checkAuthentication();
            $id_kawa_decode = $this->input->get('id');
            $id_kawa = $this->encrypt->decode(base64_decode($id_kawa_decode));
            $row = $this->kaiwa_model->get_row(array('where' => array('id' => $id_kawa)));
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'noidung_tiengnhat' => $this->input->post('noidung_tiengnhat'),
                    'noidung_phatam'    => $this->input->post('noidung_phatam'),
                    'noidung_nghia'     => $this->input->post('noidung_nghia'),
                    'nguoinoi_kanji'   => $this->input->post('nguoinoi_kanji'),
                    'nguoinoi_tuhan'   => $this->input->post('nguoinoi_tuhan'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('noidung_tiengnhat', 'Tiếng nhật', 'trim|required');
                $this->form_validation->set_rules('noidung_phatam', 'Phát âm', 'trim|required');
                $this->form_validation->set_rules('noidung_nghia', 'Nghĩa', 'trim|required');
                $this->form_validation->set_rules('nguoinoi_kanji', 'Người nói (kanji)', 'trim|required');
                $this->form_validation->set_rules('nguoinoi_tuhan', 'Người nói (từ hán)', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $param['where'] = array('id' => $id_kawa);
                    $param['data'] = $data;
                    $flag = $this->kaiwa_model->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('kaiwa/view_content?id_bai=' . base64_encode($this->encrypt->encode($row['id_bai'])));

                    $this->output->enable_profiler(true);
                }
            }

            $data['data']['row']      =  $row;
            // print_r($data['data']['row']);die;
            $data['template']         = 'kaiwa/kaiwa/edit_content';
            $data['meta_title']       = 'Cập nhật nội dung hội thoại kaiwa';
            $data['meta_description'] = 'Cập nhật nội dung hội thoại kaiwa';
            $data['title_module']     = 'Kaiwa';
            $data['sub_title_module'] = 'Cập nhật nội dung hội thoại kaiwa';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

         public function delete_content() {
            $this->auth->checkAuthentication();
            $id_kaiwa_decode = $this->input->get('id');
            $id_kawa = $this->encrypt->decode(base64_decode($id_kaiwa_decode));
            $param['where'] = array('id' => $id_kawa);
            $flag = $this->kaiwa_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            
            $row = $this->kaiwa_model->get_row(array('where' => array('id' => $id_kawa)));
            redirect('kaiwa/view_content?id_bai=' . base64_encode($this->encrypt->encode($row['id_bai'])));

            $this->output->enable_profiler(true);   
        }

        public function view_title() {
            $this->auth->checkAuthentication();
            $data['data']['table']    = $this->kaiwa_model->view_title();
            $data['template']         = 'kaiwa/kaiwa/view_title';
            $data['meta_title']       = 'Danh sách tiêu đề kaiwa';
            $data['meta_description'] = 'Danh sách tiêu đề kaiwa';
            $data['title_module']     = 'Kaiwa';
            $data['sub_title_module'] = 'Danh sách tiêu đề kaiwa';
            $this->template->call_admin_template(isset($data) ? $data : null);
            $this->output->enable_profiler(true);
        }

        public function view_content() {
            $this->auth->checkAuthentication();
            $id_bai_encode = $this->input->get('id_bai');
            $id_bai = $this->encrypt->decode(base64_decode($id_bai_encode));
            // echo $id_bai;die;
            $param['where']           = array('id_bai' => $id_bai, "noidung_tiengnhat NOT LIKE " => '');
            $data['data']['table']    = $this->kaiwa_model->view_content($param);
            $data['data']['id_bai']   = $id_bai;
            $data['template']         = 'kaiwa/kaiwa/view_content';
            $data['meta_title']       = 'Danh sách kaiwa';
            $data['meta_description'] = 'Danh sách kaiwa';
            $data['title_module']     = 'Kaiwa';
            $data['sub_title_module'] = 'Danh sách bài kaiwa';
            
            $this->template->call_admin_template(isset($data) ? $data : null);
            $this->output->enable_profiler(true);
        }

        public function json_result_kaiwa($id_bai) {    
            $param['where'] = array('kaiwa.id_bai' => $id_bai);

            $data = $this->kaiwa_model->view($param);
            // $this->output->enable_profiler(true);
            echo json_encode($data, true);
        }

        public function json_result_audio($id_theloai, $id_bai) {
            $param['where'] = array('bai_audio.id_theloai ' => $id_theloai, 'bai_audio.id_bai' => $id_bai);

            $data = $this->kaiwa_model->result_kaiwa_audio($param);
            // $this->output->enable_profiler(true);
            echo json_encode($data, true);
        }


    }
    