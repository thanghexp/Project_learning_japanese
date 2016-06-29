<?php

    class Noidung_nguphap extends MY_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model(array('nguphap_model', 'noidung_nguphap_model', 'chude/chude_model'));
            $this->load->module('backend_user/auth');
        }

        public function add() {
            $this->auth->checkAuthentication();
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));
            // echo $id_encode;die;
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_nguphap' => $this->input->post('id_nguphap'),
                    'noidung'   => $this->input->post('noidung'),
                    'vitri'   => $this->input->post('vitri'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_nguphap', 'Ngữ pháp', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_rules('noidung', 'Nội dung', 'trim|required');
                $this->form_validation->set_rules('vitri', 'Vị trí', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $flag = $this->noidung_nguphap_model->insert($data);
                    $this->session->set_flashdata('message', $flag);
                    redirect('nguphap/noidung_nguphap/view?id=' . $id_encode);

                    $this->output->enable_profiler(true);
                }
            }
            $data['data']['dropdown'] = $this->nguphap_model->dropdown();
            $data['template']         = 'nguphap/noidung_nguphap/add';
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
                    'id_nguphap' => $this->input->post('id_nguphap'),
                    'noidung'   => $this->input->post('noidung'),
                    'vitri'   => $this->input->post('vitri'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_nguphap', 'Ngữ pháp', 'trim|required|is_natural_no_zero');
                $this->form_validation->set_rules('noidung', 'Nội dung', 'trim|required');
                $this->form_validation->set_rules('vitri', 'Vị trí', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $param['where'] = array('id' => $id);
                    $param['data'] = $data;
                    $flag = $this->noidung_nguphap_model->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('nguphap/noidung_nguphap/view?id=' . $id_encode);

                    $this->output->enable_profiler(true);
                }
            }
            $data['data']['dropdown'] = $this->chude_model->dropdown();
            $data['data']['row']      = $this->noidung_nguphap_model->get_row(array('where' => array('id' => $id)));
            $data['template']         = 'nguphap/noidung_nguphap/edit';
            $data['meta_title']       = 'Cập nhật';
            $data['meta_description'] = 'Cập nhật';
            $data['title_module']     = 'Nội dung ngữ pháp';
            $data['sub_title_module'] = 'Cập nhật';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

         public function delete() {
            $this->auth->checkAuthentication();
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));
            $param['where'] = array('id' => $id);
            $flag = $this->nguphap_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            
            redirect('nguphap/noidung_nguphap/view?id=' . $id_encode);
            $this->output->enable_profiler(true);   
        }    

        public function view() {
            $this->auth->checkAuthentication();
            $id_encode                = $this->input->get('id');
            $id                       = $this->encrypt->decode(base64_decode($id_encode));
            $param['select']          = 'noidung_nguphap.id, name, id_nguphap, noidung, vitri';
            $param['join_table']      = array('nguphap' => 'nguphap.id = noidung_nguphap.id_nguphap');
            $param['where']           = array('id_nguphap' => $id);
            $data['data']['id']       = $id;
            $data['data']['table']    = $this->noidung_nguphap_model->view($param);
            $data['template']         = 'nguphap/noidung_nguphap/view';
            $data['meta_title']       = 'Xem danh sách ';
            $data['meta_description'] = 'Xem danh sách ';
            $data['title_module']     = 'Nội dung ngữ pháp';
            $data['sub_title_module'] = 'Xem danh sách ';
            $this->template->call_admin_template(isset($data) ? $data : null);
            
        }


        public function json_result_noidung($id_nguphap) {    
            $param['where'] = array('id_nguphap' => $id_nguphap);

            $data = $this->noidung_nguphap_model->view($param);
            // $this->output->enable_profiler(true);
            echo json_encode($data, true);
        }

    }
        