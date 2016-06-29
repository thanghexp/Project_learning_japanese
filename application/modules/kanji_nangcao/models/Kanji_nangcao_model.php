<?php
class Kanji_nangcao_model extends MY_Model {

	public $table = 'tuvung';

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

	public function view($param = null) {
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

	public function count_result() {
		
		$query = $this->db->get($this->table);
	    return count($query->result()); 
	}

}