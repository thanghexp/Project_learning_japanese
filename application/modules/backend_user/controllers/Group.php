<?php
    class Group extends MY_Controller {

        public function __construct()
        {
            parent::__construct();
        }

        public function index() {
            $this->form_validation->set_message();

        }

        public function demo() {
            $this->form_validation->set_message();
        }

        
    }