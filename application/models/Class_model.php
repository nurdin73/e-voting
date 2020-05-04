<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_Model {

	var $table = "tbl_kelas";

	function delete_class($id)
	{
		$response = [];
		$decrypt = decrypt_url($id);
		$this->db->set('is_active', 0);
		$this->db->where('id', $decrypt);
		$result = $this->db->update($this->table);
		if(!$result) {
			$response['res'] = false;
			$response['message'] = "Delete class failed";
			return $response;
		} else {
			$response['res'] = true;
			$response['message'] = "Delete class success";
			return $response;
		}
 	}

}

/* End of file Class_model.php */
/* Location: ./application/models/Class_model.php */