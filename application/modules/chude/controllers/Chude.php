<?php

    class Chude extends MY_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('chude_model', 'audio_model' ));
            $this->load->library('session');
        }

        public function add() {
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'ten' => $this->input->post('ten'),
                    'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
                    'loai' => $this->input->post('loai')
                );

                /* Form Validation */
                $this->form_validation->set_rules('ten', 'Tên chủ đề / bài', 'trim|required');
                $this->form_validation->set_rules('loai', 'Loại', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $flag = $this->chude_model->insert($data);
                    $this->session->set_flashdata('message', $flag);
                    redirect('chude/chude/view');
                    
                    $this->output->enable_profiler(true);
                }
            }

            $data['template'] = 'chude/chude/add';
            $data['meta_title'] = 'Thêm mới bài - chủ đề';
            $data['meta_description'] = 'Thêm mới chủ đề';
            $data['title_module'] = 'Bài - chủ đề';	
            $data['sub_title_module'] = 'Thêm mới bài - chủ đề';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function edit($id = null) {
            $id = $this->encrypt->decode(base64_decode($this->input->get('id')));
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
                    $flag = $this->chude_model->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('chude/view');

                    $this->output->enable_profiler(true);
                }

                if ($this->form_validation->run() == FALSE) {
                    $data['template'] = 'chude/chude/edit ';
                }
            }
            $data['data']['data_row'] = $this->chude_model->get_row(array('where' => array('id' => $id)));
            $data['template'] = 'chude/chude/edit';
            $data['meta_title'] = 'Cập nhật bài - chủ đề';
            $data['meta_description'] = 'Cập nhật bài - chủ đề';
            $data['title_module'] = 'Bài - chủ đề';
            $data['sub_title_module'] = 'Cập nhật bài - chủ đề';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function delete($id = null) {
            $id = $this->encrypt->decode(base64_decode($this->input->get('id')));
            $param['where'] = array('id' => $id);
            $flag = $this->chude_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            redirect('chude/chude/view');
            $this->output->enable_profiler(true);
        }

        public function view() {
            $data['data']['table'] = $this->chude_model->view();
            $data['template'] = 'chude/chude/view';
            $data['meta_title'] = 'Thêm mới bài - chủ đề';
            $data['meta_description'] = 'Thêm mới bài - chủ đề';
            $data['title_module'] = 'Bài - chủ đề';
            $data['sub_title_module'] = 'Danh sách bài - chủ đề';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }


        public function json_result_bai() {
            $param['where'] = array('loai' => 1);
            $data = $this->chude_model->view($param);
            echo json_encode($data, true);
        }

        public function json_result_bai_coban() {
            $param['where'] = array('loai' => 2);
            $data = $this->chude_model->view($param);
            echo json_encode($data, true);
        }

        public function json_result_bai_nangcao() {
            $param['where'] = array('loai' => 3);
            $data = $this->chude_model->view($param);
            echo json_encode($data, true);
        }

        public function json_result_jspt() {
            $param['select'] = 'DISTINCT(bai_chude.id) as id, ten';
            $param['where'] = array('loai' => 4);
            $param['join_table'] = array('cauhoi' => 'cauhoi.id_bai = bai_chude.id');
            $data = $this->chude_model->view($param);
            echo json_encode($data, true);   
        }

        public function json_result_theloai() {

            $data = $this->chude_model->result_theloai();
            echo json_encode($data, true);
        }

    }
    