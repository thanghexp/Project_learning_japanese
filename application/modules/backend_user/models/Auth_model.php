<?php
	class Auth_model extends MY_Model {
		
		public $table = 'nguoidung';

		public function __construct() {
			parent::__construct();
		}

		public function getRow($param) { 
			$param['table'] = $this->table;
			$param['list'] = FALSE;
			if(isset($param) && is_array($param)) {
				return $this->_general($param);
			}
		}

		public function insert($data) {
			$param['table'] = $this->table;
			// $param['type'] = false;
			$param['data'] = $data;
			if(isset($param) && is_array($param)) {
				$flag = $this->_save($param);
				if($flag > 0) {
					return array('type' => 'success', 'message' => 'Đăng ký thành công !');	
				} 
				return array('type' => 'error', 'message' => 'Đăng ký thất bại !');
			}
		}

		public function update($param) {
			$param['table'] = $this->table;
			$param['type'] = false;
			// $param['data'] = $;
			if(isset($param) && is_array($param)) {
				$flag = $this->_save($param);
				if($flag > 0) {
					return array('type' => 'success', 'message' => 'Cập nhật thành công !');	
				} 
				return array('type' => 'error', 'message' => 'Cập nhật thất bại !');
			}
		}

		public function count_result() {
			$param['table'] = $this->table;
			$param['count'] = TRUE;
			return $this->_general($param);
		}
	}

