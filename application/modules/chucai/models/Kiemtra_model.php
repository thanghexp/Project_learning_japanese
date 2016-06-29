<?php
class Kiemtra_model extends MY_Model {

	public $table = 'kiemtra';

	public function __construct() {
		parent::__construct();
	}

	public function insert($data = null) {
		$param['table'] = $this->table;
		$param['data'] = $data;
		$param['type'] = FALSE;
		if(isset($data)) {
			$flag = $this->_save($param);	
			if($flag > 0) {
				return array('type' => 'success', 'message' => 'Thêm mới bản ghi (<small>'. $flag .'</small>) thành công !');
			} 
			return array('type' => 'error', 'message' => 'Không thể thêm bản (<small>'. $flag .'</small>) ghi này!');
		}

	}

	public function update($data = null) {
		$param['where'] = $data['where'];
		$param['table'] = $this->table;
		$param['data'] = $data['data'];
		$param['type'] = FALSE;
		if(isset($data)) {
			$flag = $this->_save($param);	
			if($flag > 0) {
				return array('type' => 'success', 'message' => 'Cập nhật thành công !');
			}
			return array('type' => 'error', 'message' => 'Cập nhật thất bại!');
		}
	}

	public function view($where = null) {
		$param['select'] = 'kiemtra.id as id, kiemtra.id_chucai as id_chucai, phatam, noidung, dapan ';
		if(isset($where)) {
			
			$param['where'] = $where;
		}
		$param['join_table'] = array('chucai' => 'kiemtra.id_chucai = chucai.id');
		$param['table'] = $this->table;
		$param['list'] = TRUE;
		return $this->_general($param);
	}


	public function get_row($param) {
		$param['table'] = $this->table;
		$param['list'] = FALSE;
		return $this->_general($param);
	}

	public function delete($param) {
		$param['table'] = $this->table;
		$flag = $this->_delete($param);
		if($flag > 0) {
			return array('type' => 'success', 'message' => 'Xóa bản ghi thành công !');
		}
		return array('type' => 'error', 'message' => 'Không thể xóa bản ghi này!');
	}

	public function dropdown() {
		$param['table'] = 'chucai';	
 		$param['where_string'] = 'id NOT IN (SELECT id_chucai FROM kiemtra)';
 		$param['list'] = TRUE;
		$data = $this->_general($param);
		// print_r($data);die;
		if(isset($data)) {
			$temp['0'] = '--- Select cauhoi ---';
			foreach ($data as $key => $value) {
				$temp[$value['id']] = $value['katakana'];
			}
		}
		return $temp;
	}

	public function count_result() {
		$param['table'] = $this->table;
		$param['count'] = TRUE;
		return $this->_general($param);
	}
}