<?php
    class Tumoi extends MY_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('tumoi_model', 'chude/chude_model'));
            $this->load->module('backend_user/auth');
        }

        public function add() {
            $this->auth->checkAuthentication();
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_bai'           => $this->input->post('id_bai'),
                    'tiengnhat' => $this->input->post('tiengnhat'),
                    'tuhan'    => $this->input->post('tuhan'),
                    'nghia_han'     => $this->input->post('nghia_han'),
                    'nghia'     => $this->input->post('nghia'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Bài / Chủ đề', 'trim|required');
                $this->form_validation->set_rules('tiengnhat', 'Tiếng nhật', 'trim|required');
                $this->form_validation->set_rules('tuhan', 'Phát âm', 'trim|required');
                $this->form_validation->set_rules('nghia_han', 'Nghĩa', 'trim|required');
                $this->form_validation->set_rules('nghia', 'Nghĩa', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $flag = $this->tumoi_model->insert($data);
                    $this->session->set_flashdata('message', $flag);
                    redirect('tumoi/view');

                    $this->output->enable_profiler(true);
                }
            }
            $param = array('loai' => 1);
            $data['data']['dropdown'] = $this->chude_model->dropdown($param);
            $data['template']         = 'tumoi/add';
            $data['meta_title']       = 'Thêm mới';
            $data['meta_description'] = 'Thêm mới';
            $data['title_module']     = 'Từ mới';
            $data['sub_title_module'] = 'Thêm mới';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function edit() {
            $this->auth->checkAuthentication();
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));    
            $this->load->library('form_validation');
            if ($this->input->post('submit')) {
                /* Post data */
                $data = array(
                    'id_bai'           => $this->input->post('id_bai'),
                    'tiengnhat' => $this->input->post('tiengnhat'),
                    'tuhan'    => $this->input->post('tuhan'),
                    'nghia_han'     => $this->input->post('nghia_han'),
                    'nghia'     => $this->input->post('nghia'),
                );

                /* Form Validation */
                $this->form_validation->set_rules('id_bai', 'Bài / Chủ đề', 'trim|required');
                $this->form_validation->set_rules('tiengnhat', 'Tiếng nhật', 'trim|required');
                $this->form_validation->set_rules('tuhan', 'Phát âm', 'trim|required');
                $this->form_validation->set_rules('nghia_han', 'Nghĩa', 'trim|required');
                $this->form_validation->set_rules('nghia', 'Nghĩa', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $param['where'] = array('id' => $id);
                    $param['data'] = $data;
                    $flag = $this->tumoi_model->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('tumoi/view');

                    $this->output->enable_profiler(true);
                }
            }

            $param = array('loai' => 1);
            $where = array('id' => $id);
            $data['data']['dropdown'] = $this->chude_model->dropdown($param);
            $data['data']['row'] = $this->tumoi_model->get_row($where);
            $data['template']         = 'tumoi/edit';
            $data['meta_title']       = 'Cập nhật kaiwa';
            $data['meta_description'] = 'Cập nhật kaiwa';
            $data['title_module']     = 'Từ mới';
            $data['sub_title_module'] = 'Cập nhật kaiwa';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function delete($id = null) {
            $this->auth->checkAuthentication();
            $id_encode = $this->input->get('id');
            $id = $this->encrypt->decode(base64_decode($id_encode));    
            $param['where'] = array('id' => $id);
            $flag = $this->tumoi_model->delete($param);
            $this->session->set_flashdata('message', $flag);
            redirect('kaiwa/view');
            $this->output->enable_profiler(true);
        }

        public function view() {
            $this->auth->checkAuthentication();
            $data['data']['table']    = $this->tumoi_model->view();
            $data['template']         = 'tumoi/view';
            $data['meta_title']       = 'Danh sách kaiwa';
            $data['meta_description'] = 'Danh sách kaiwa';
            $data['title_module']     = 'Kaiwa';
            $data['sub_title_module'] = 'Danh sách bài kaiwa';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function json_result_tumoi($id_bai) {
            $param['where'] = array('tumoi.id_bai' => $id_bai);

            $data = $this->tumoi_model->view($param);
            // $this->output->enable_profiler(true);
            echo json_encode($data, true);
        }

        public function json_result_audio($id_theloai, $id_bai) {
            $param['where'] = array('kaiwa.id_theloai ' => $id_theloai, 'kaiwa.id_bai' => $id_bai);

            $data = $this->tumoi_model->result_kaiwa_audio($param);
            // $this->output->enable_profiler(true);
            echo json_encode($data, true);
        }


    }
    