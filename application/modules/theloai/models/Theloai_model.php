<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Theloai_model extends MY_Model {

	public $table = 'theloai';

	public function __construct() {
		parent::__construct();
	}

	public function insert($data = null) {
		$param['table'] = $this->table;
		$param['data']  = $data;
		$param['type']  = FALSE;
		if(isset($data)) {
			$flag = $this->_save($param);	
			if($flag > 0) {
				return array('type' => 'success', 'message' => 'Thêm mới bản ghi (<small>'. $flag .'</small>) thành công !');
			} 
			return array('type' => 'error', 'message' => 'Không thể thêm bản ghi (<small>'. $flag .'</small>) này!');
		}

	}

	public function update($data = null) {
		$param['where'] = $data['where'];
		$param['table'] = $this->table;
		$param['data']  = $data['data'];
		$param['type']  = FALSE;
		if(isset($data)) {
			$flag = $this->_save($param);	
			if($flag > 0) {
				return array('type' => 'success', 'message' => 'Cập nhật thành công !');
			}
			return array('type' => 'error', 'message' => 'Cập nhật thất bại!');
		}
	}

	public function view() {
		$param['table'] = $this->table;
		$param['list']  = TRUE;
		return $this->_general($param);
	}

	public function get_row($param) {
		$param['table'] = $this->table;
		$param['list']  = FALSE;
		return $this->_general($param);
	}


	public function delete($param) {
		$param['table'] = $this->table;
		$flag           = $this->_delete($param);
		if($flag > 0) {
			return array('type' => 'success', 'message' => 'Xóa bản ghi thành công !');
		}
		return array('type' => 'error', 'message' => 'Không thể xóa bản ghi này!');	
	}

	public function count_result() {
		$param['table'] = $this->table;
		$param['count'] = TRUE;
		return $this->_general($param);
	}

	public function dropdown() {
		$param = array(
						'select' => 'id, tentheloai',
						'table'  => $this->table,
						'list'   => TRUE
					);
		$data = $this->_general($param);
		if(isset($data) && count($data) > 0) {
			$temp['0'] = '--- Chọn thể loại ---';
			foreach ($data as $key => $value) {
				$temp[$value['id']] = $value['tentheloai'];
			}
			return $temp;	
		}
		
		
	}
	
}