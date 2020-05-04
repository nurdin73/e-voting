<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model {

	protected $table = "tbl_user";
	protected $select_column = ['id', 'NIS', 'nama_lengkap', 'status'];
	protected $order_column = [null, 'NIS', 'nama_lengkap', 'status'];

	function make_query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		if (isset($_POST['search']['value'])) {
            $this->db->like("nama_lengkap", $_POST['search']['value']);
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'desc');
        }
	}

	function make_datatables($length, $start, $kelas)
    {
        $this->make_query();
        $this->db->where('kelas', $kelas);
        if ($length != -1) {
            $this->db->limit($length, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->count_all_results();    
    }


}

/* End of file Peserta_model.php */
/* Location: ./application/models/Peserta_model.php */