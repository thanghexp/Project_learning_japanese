<?php
class Tumoi_model extends MY_Model {

	public $table = 'tumoi';

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

	public function result_kaiwa_audio($param = null) {
		$param['where'] = $param['where'];
		$param['select'] = 'kaiwa.id as id, tieude_tiengnhat, tieude_phatam, tieude_nghia, nguoinoi_kanji, nguoinoi_tuhan';
		$param['join_table'] = array(	
										'bai_chude' => 'kaiwa.id_bai = bai_chude.id',
										'bai_audio' => 'bai_audio.id_bai = bai_chude.id'
									);
		$param['table'] = $this->table;
		$param['list']  = TRUE;
		return $this->_general($param);
	}

	public function update($data = null) {
		$param['where'] = $data['where'];
		$param['table'] = $this->table;		
		$param['type'] = FALSE;
		$param['data'] = $data['data'];
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
		$param['join_table'] = array('bai_chude' => 'tumoi.id_bai = bai_chude.id');
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
		$param['table'] = $this->table;
		$param['count'] = TRUE;
		return $this->_general($param);
	}
	
}