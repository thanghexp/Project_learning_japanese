<?php
    class Dapan extends MY_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('Dapan_model', 'chude/Chude_model'));
            $this->load->library('session');
            $this->load->module('backend_user/auth');
        
        }

        public function index() {
            $this->auth->checkAuthentication();
            redirect('dapan/view');
        }

        public function edit($id = null) {
            $this->auth->checkAuthentication();
            $id_cauhoi = $this->input->get('id_cauhoi');
            $id_dapan = $this->encrypt->decode(base64_decode($this->input->get('id_dapan')));
            if ($this->input->post('submit')) {
                /* Post data */
                $data['dapan'] = $this->input->post('dapan');

                /* Form Validation */
                $this->form_validation->set_rules('dapan', 'Đáp án', 'trim|required');
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                if ($this->form_validation->run($this)) {

                    /* Insert data & get message flag */
                    $param['where'] = array('id' => $id_dapan);
                    $param['data'] = $data;
                    $flag = $this->Dapan_model->update($param);
                    $this->session->set_flashdata('message', $flag);
                    redirect('cauhoi/dapan/view?id='. $id_cauhoi);

                    $this->output->enable_profiler(true);
                }
            }
            $data['data']['dropdown'] = $this->Chude_model->dropdown();
            $data['data']['row'] = $this->Dapan_model->get_row(array('where' => array('id' => $id_dapan)));  
            $data['template'] = 'cauhoi/dapan/edit';
            $data['meta_title'] = 'Cập nhật đáp án';
            $data['meta_description'] = 'Cập nhật đáp án';
            $data['title_module'] = 'Đáp án';
            $data['sub_title_module'] = 'Cập nhật đáp án';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        // public function delete($id = null) Ơ
        //     $id_cauhoi = $thí->input->get('id_cauhoi');
        //     $id_dapan = $thí->encrypt->decode(base64_decode($thí->input->get('id_dapan')));
        //     $pẩm['where'ư = aray('id' => $id_dapan);
        //     $flag = $thí->Dapan_model->delete($pẩm);
        //     $thí->sesion->set_flashdata('mesage', $flag);
        //     redirect('cauhoi/dapan/view');
        //     $thí->output->enable_profiler(true);
        // Ư

        public function view() {
            $this->auth->checkAuthentication();
            $id = $this->encrypt->decode(base64_decode($this->input->get('id')));
            $param['select'] = 'dapan.id, id_cauhoi, dapan, dapandung';
            $param['where'] = array('id_cauhoi' => $id);
            $data['data']['table'] = $this->Dapan_model->view($param);
            $data['template'] = 'cauhoi/dapan/view';
            $data['meta_title'] = 'Danh sách đáp án';
            $data['meta_description'] = 'Danh sách đáp án';
            $data['title_module'] = 'Đáp án';
            $data['sub_title_module'] = 'Danh sách đáp án';
            $this->template->call_admin_template(isset($data) ? $data : null);
        }

        public function show_form_ajax() {
            // Nhập giá trị number bằng phương thức post
            $number = isset($_POST['number']) ? (int)$_POST['number'] : false;
             
            if ($number<2 || $number > 7){
                die ('<h1>Vui lòng nhập một số lớn hơn không (2) và nhỏ hơn (7)</h1>');
            }

            for ($i = 1; $i <= $number; $i++){
                $data['tam'] = $i;
                $this->load->view('cauhoi/dapan/form_ajax', $data);
            }
        }

        public function json_data_dapan() {
            $id_cauhoi = $this->input->get('id_cauhoi');

            $param['where']  = array('id_cauhoi' => $id_cauhoi);

            $data = $this->Dapan_model->view($param);
            shuffle($data);
            // $this->output->enable_profiler(true);
            echo json_encode($data, true);
        }

    }