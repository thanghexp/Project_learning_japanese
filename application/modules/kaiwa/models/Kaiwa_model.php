<?php
class Kaiwa_model extends MY_Model {

	public $table = 'kaiwa';

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


	public function get_result($param = null) {
		$param['table'] = $this->table;
		$param['list'] = TRUE;
		return $this->_general($param);
	}

	public function result_kaiwa_audio($param = null) {
		$param['where'] = $param['where'];
		$param['select'] = 'audio';
		// $param['join_table'] = array(	
										// '' => 'bai_audio.id_bai = kaiwa.id',
										// 'bai_chude' => 'bai_chude.id = bai_audio.id_bai',
									// );
		$param['table'] = 'bai_audio';
		$param['list']  = FALSE;
		return $this->_general($param);
	}

	// public function result_kaiwa($param = null) {
	// 	$param['where'] = $param['where'];
	// 	$param['select'] = 'kaiwa.id as id, tieude_tiengnhat, tieude_phatam, tieude_nghia, nguoinoi_kanji, nguoinoi_tuhan';
	// 	$param['join_table'] = array(	
	// 									'bai_chude' => 'kaiwa.id_bai = bai_chude.id',
	// 									'bai_audio' => 'bai_audio.id_bai = bai_chude.id'
	// 								);
	// 	$param['table'] = $this->table;
	// 	$param['list']  = TRUE;
	// 	return $this->_general($param);
	// }

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
		$param['join_table'] = array('bai_chude' => 'kaiwa.id_bai = bai_chude.id',);
		$param['table'] = $this->table;
		$param['list'] = TRUE;
		return $this->_general($param);
	}

	public function view_title($param = null) {
		$param['select'] = 'kaiwa.id as id, id_bai, ten, tieude_tiengnhat, tieude_phatam, tieude_nghia';
		$param['where'] = array("tieude_tiengnhat NOT LIKE " => '');
		$param['join_table'] = array('bai_chude' => 'kaiwa.id_bai = bai_chude.id',);
		$param['table'] = $this->table;
		$param['list'] = TRUE;
		return $this->_general($param);
	}

	public function view_content($param = null) {
		$param['select'] = 'kaiwa.id as id, ten, noidung_tiengnhat, noidung_phatam, noidung_nghia, nguoinoi_kanji, nguoinoi_tuhan';
		$param['join_table'] = array('bai_chude' => 'bai_chude.id = kaiwa.id_bai');
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
		$param['table'] = $this->table;
		$param['count'] = TRUE;
		return $this->_general($param);
	}	

	public function dropdown_kaiwa_chude() {
		$param = array(
						'select'     => 'id, ten ',
						'table'      => 'bai_chude',
						'list'       => TRUE,	
						// 'join_table' => array('bai_chude' => 'bai_chude.id  = kaiwa.id_bai')
						'where_string'		 => 'id NOT IN (Select id_bai From kaiwa)',
						'where'	=> array('loai' => 2)
					);
		$data = $this->_general($param);
		// print_r($data);die;
		if(isset($data) && count($data) > 0) {
			$temp['0'] = '--- Chọn chủ đề / bài ---';
			foreach ($data as $key => $value) {
				$temp[$value['id']] = $value['ten'];
			}
		} else {
			$temp['0'] = '--- Bạn cần thêm bài ---';
		}
		return $temp;
	}
	
}