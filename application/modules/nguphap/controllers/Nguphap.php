<?php

    class Nguphap extends MY_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->model(array('nguphap_model', 'chude/chude_model'));
            $this->load->module('backend_user/auth');
        }

        public function add() {
            $this->auth->checkAuthentication();
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_bai' => $this->input->post('id_bai'),
                    'name'   => $this->input->post('name'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Bài / Chủ đề', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_rules('name', 'Tiêu đề', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $flag = $this->nguphap_model->insert($data);
                    $this->session->set_flashdata('message', $flag);
                    redirect('nguphap/nguphap/view');

                    $this->output->enable_profiler(true);
                }
            }
            $param = array('loai' => 1);
            $data['data']['dropdown'] = $this->chude_model->dropdown($param);
            $data['template']         = 'nguphap/nguphap/add';
            $data['meta_title']       = 'Thêm mới ';
            $data['meta_description'] = 'Thêm mới';
            $data['title_module']     = 'Ngữ pháp';
            $data['sub_title_module'] = 'Thêm mới';
            $this->template->call_admin_template(isset($data) ? $data : null);
            $this->output->enable_profiler(true);
        }

        public function edit() {
            $this->auth->checkAuthentication();
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));

            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_bai'           => $this->input->post('id_bai'),
                    'tieude_tiengnhat' => $this->input->post('tieude_tiengnhat'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Bài / Chủ đề', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_rules('tieude_tiengnhat', 'Tiếng nhật', 'trim|required');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $param['where'] = array('id' => $id);
                    $param['data'] = $data;
                    $flag = $this->nguphap_model->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('nguphap/view');

                    $this->output->enable_profiler(true);
                }
            }
            $param = array('loai' => 1);
            $data['data']['dropdown'] = $this->chude_model->dropdown($param);
            $data['data']['row']      = $this->nguphap_model->get_row(array('where' => array('id' => $id)));
            $data['template']         = 'nguphap/nguphap/edit';
            $data['meta_title']       = 'Cập nhật tiêu đề nguphap';
            $data['meta_description'] = 'Cập nhật tiêu đề nguphap';
            $data['title_module']     = 'Ngữ pháp';
            $data['sub_title_module'] = 'Cập nhật tiêu đề nguphap';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

         public function delete() {
            $this->auth->checkAuthentication();
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));
            $param['where'] = array('id' => $id);
            $flag = $this->nguphap_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            
            redirect('nguphap/view');
            $this->output->enable_profiler(true);   
        }    

        public function view() {
            $this->auth->checkAuthentication();
            $data['data']['table']    = $this->nguphap_model->view();
            $data['template']         = 'nguphap/nguphap/view';
            $data['meta_title']       = 'Danh sách tiêu đề ngữ pháp';
            $data['meta_description'] = 'Danh sách tiêu đề ngữ pháp';
            $data['title_module']     = 'Ngữ pháp';
            $data['sub_title_module'] = 'Danh sách tiêu đề ngữ pháp';
            $this->template->call_admin_template(isset($data) ? $data : null);
            $this->output->enable_profiler(true);
        }


        public function json_result_nguphap($id_bai) {    
            $param['where'] = array('nguphap.id_bai' => $id_bai);

            $data = $this->nguphap_model->view($param);
            // $this->output->enable_profiler(true);
            echo json_encode($data, true);
        }

    }
        