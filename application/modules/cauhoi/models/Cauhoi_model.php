<?php
class Cauhoi_model extends MY_Model {

	public $table = 'cauhoi';

	public function __construct() {
		parent::__construct();
	}

	public function insert($data = null) {
		$param['table'] = $this->table;
		$param['data'] = $data;
		$param['type'] = FALSE;
		if(isset($data)) {
			$flag = $this->_save($param);	
		}
		return $flag;
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
		// $param['select'] = 'cauhoi.id as id, cauhoi.id_bai as id_bai, cauhoi.noidung as noidung, cauhoi.img as img';
		$param['table'] = $this->table;
		// $param['join_table'] = array('dapan' => 'cauhoi.id = dapan.id_cauhoi');
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

	public function count_result($param = null) {		
		$param['table'] = $this->table;
		$param['count'] = TRUE; 
		return ($this->_general($param)  >= 4) ? 4 : $this->_general($param);
	}

	public function get_result($param = null) {
		$number =  $this->count_result($param['where']); 

		$param['select'] = 'cauhoi.id as id, cauhoi.id_bai as id_bai, cauhoi.noidung as noidung, cauhoi.img as img';
		$param['table'] = $this->table;
		$param['join_table'] = array( 'bai_chude' => 'bai_chude.id = cauhoi.id_bai');
		$param['limit'] = ($number >= 4) ? 4 : $number;
		$param['offset'] = 0;
		$param['list'] = TRUE;
		return $this->_general($param);
	}

	
}