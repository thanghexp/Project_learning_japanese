<?php defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function _general($param = '') {
		/* SELECT */
		$this->db->select(isset($param['select']) ? $param['select'] : '*');
		/* FROM */
		if(isset($param['table']) && !empty($param['table'])) {
			$this->db->from($param['table']);
		}
		/* ORDER_BY */
		if(isset($param['order_by']) && is_array($param['order_by'])) {
			$this->db->order_by($param['order_by']);
		}
		/* LIMIT */
		if((isset($param['offset']) && $param['offset'] >= 0) && (isset($param['limit']) && $param['limit'] >= 0)) {
			$this->db->limit($param['limit'], $param['offset']);
		}
		/* INNERT JOIN */
		if(isset($param['join_table']) && !empty($param['join_table'])) {
			/* @Example : array('table2' => table2.id = table1.id'); */
			foreach ($param['join_table'] as $key => $value) {
				$this->db->join($key, $value);
			}
		}
		/* WHERE */
		if(isset($param['where']) && is_array($param['where'])) {
			$this->db->where($param['where']);
		}
		/* WHERE */
		if(isset($param['where_string']) ) {
			$this->db->where($param['where_string']);
		}
		/* WHERE_ARRAY*/
		if(isset($param['field_where_array']) && (isset($param['where_array']) && is_array($param['where_array']))) {
			$this->db->where_in($param['field_where_array'], $param['where_array']);
		}
		/* COUNT OR GET */
		if(isset($param['count']) == TRUE) {
			$count = $this->db->count_all_results();
			$this->db->flush_cache();
			return $count;
		} else {
			if(isset($param['list']) && $param['list'] == TRUE) {
				if(isset($param['type']) && $param['type'] == 'object') {
					$result_object = $this->db->get()->result_object();
					$this->db->flush_cache();
					return $result_object;
				}
				$result_array = $this->db->get()->result_array();
				$this->db->flush_cache();
				return $result_array;
			}
			else {
				$row_array = $this->db->get()->row_array();
				$this->db->flush_cache();
				return $row_array;
			}
		}
		return null;
	}

	public function _save($param) {
		$flag = 0;
		$data = $param['data'];
		// print_r($param);die;
		/* WHERE */
		if(isset($param['where']) && is_array($param['where'])) {
			$flag = $flag + 1;
			$this->db->where($param['where']);
		}
		/* WHERE_ARRAY*/
		if(isset($param['field_where_array']) && (isset($param['where_array']) && is_array($param['where_array']))) {
			$flag = $flag + 1;
			$this->db->where_in($param['field_where_array'], $param['where_array']);
		}
		/* INSERT OR UPDATE */
		if($flag == 0) {
			if($param['type'] == TRUE) {
				$this->db->set($data);
				$this->db->insert_batch($param['table']);
				$this->db->flush_cache();	
			} else {
				$this->db->set($data);
				$this->db->insert($param['table']);
				$this->db->flush_cache();
				return $this->db->insert_id();
			}
		}
		else { 
			if($param['type'] == TRUE) {
				$this->db->set($data);
				$this->db->update_batch($param['table']);
				$this->db->flush_cache();
			} else {
				$this->db->set($data);
				$this->db->update($param['table']);
				$this->db->flush_cache();
				return $this->db->affected_rows();
			}
		}
	}

	public function _delete($param) {
		$flag = 0;
		/* WHERE */
		if(isset($param['where']) && is_array($param['where'])) {
			$flag = $flag + 1;
			$this->db->where($param['where']);
		}
		/* WHERE_ARRAY*/
		if(isset($param['field_where_array']) && (isset($param['where_array']) && is_array($param['where_array']))) {
			$flag = $flag + 1;
			$this->db->where_in($param['field_where_array'], $param['where_array']);
		}
		/* DELETE */
		if($flag > 0) {
			$this->db->delete($param['table']);
			return $this->db->affected_rows();
		}	
	}

}