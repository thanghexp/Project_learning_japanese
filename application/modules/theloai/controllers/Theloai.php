<?php

    class Chude extends MY_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Model_Chude');
            $this->load->library('session');
            $this->load->module('backend_user/auth');
            $this->auth->checkAuthentication();
        }

        public function add() {
            $this->load->library('form_validation');
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'ten' => $this->input->post('ten'),
                    'created' => gmdate('Y-m-d H:i:s', time() + 7*3600)
                );

                /* Form Validation */
                $this->form_validation->set_rules('ten', 'Tên chủ đề / bài', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $flag = $this->Model_Chude->insert($data);
                    $this->session->set_flashdata('message', $flag);
                    redirect('chude/view');

                    $this->output->enable_profiler(true);
                }
            }

            $data['template'] = 'chude/add';
            $data['meta_title'] = 'Thêm mới bài - chủ đề';
            $data['meta_description'] = 'Thêm mới chủ đề';
            $data['title_module'] = 'Bài - chủ đề';	
            $data['sub_title_module'] = 'Thêm mới bài - chủ đề';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function edit($id = null) {
            $this->load->library('form_validation');
            if ($this->input->post('submit')) {
                /* Post data */
               $data = array(
                    'ten' => $this->input->post('ten'),
                    'updated' => gmdate('Y-m-d H:i:s', time() + 7*3600)
                );

                /* Form Validation */
                $this->form_validation->set_rules('ten', 'Tên chủ đề / bài', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {
                    /* Update data & get message flag */
                    $param['where'] = array('id' => $id);
                    $param['data'] = $data;
                    $flag = $this->Model_Chude->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('chude/view');

                    $this->output->enable_profiler(true);
                }

                if ($this->form_validation->run() == FALSE) {
                    $data['template'] = 'chude/edit ';
                }
            }
            $data['data']['data_row'] = $this->Model_Chude->get_row(array('where' => array('id' => $id)));
            $data['template'] = 'chude/edit';
            $data['meta_title'] = 'Cập nhật bài - chủ đề';
            $data['meta_description'] = 'Cập nhật bài - chủ đề';
            $data['title_module'] = 'Bài - chủ đề';
            $data['sub_title_module'] = 'Cập nhật bài - chủ đề';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function delete($id = null) {
            $param['where'] = array('id' => $id);
            $flag = $this->Model_chude->delete($param);
            $this->session->set_flashdata('message', $flag);
            redirect('chude/view');
            $this->output->enable_profiler(true);
        }

        public function view() {
            $data['data']['table'] = $this->Model_Chude->view();
            $data['template'] = 'chude/view';
            $data['meta_title'] = 'Thêm mới bài - chủ đề';
            $data['meta_description'] = 'Thêm mới bài - chủ đề';
            $data['title_module'] = 'Bài - chủ đề';
            $data['sub_title_module'] = 'Danh sách bài - chủ đề';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

    }
    