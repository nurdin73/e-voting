<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function menu()
    {
        
        $query = "SELECT * FROM tbl_menu WHERE is_active = 1 ORDER BY title ASC";
        $menu = $this->db->query($query)->result_array();
        return $menu;
    }
    function submenu($menu_id)
    {
        $submenu = $this->db->get_where('tbl_submenu', ['is_active' => 1, 'menu_id' => $menu_id])->result_array();
        return $submenu;
    }

    function apk()
    {
        $apk = $this->db->get('tbl_pengaturan')->row_array();
        return $apk;
    }
    // detail
    function detailPaslon($id)
    {
        $detail = $this->db->get_where('tbl_calon', ['id' => $id])->row_array();
        $data = [
            'id'   => $detail['id'],
            'foto' => $detail['foto_calon'],
            'nama' => $detail['nama_calon'],
            'visi' => $detail['visi'],
            'misi' => $detail['misi'],
            'vot'  => $detail['jumlah_voting']
        ];
        echo json_encode($data);
    }
    // delete
    function deletePaslon($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_calon');
    }
    // data paslon
    function getPaslon()
    {
        $data = $this->db->get('tbl_calon')->result_array();
        $no = 1;
        $response = [];
        $response['result'] = "true";
        $response['hasil'] = [];
        foreach ($data as $d) {
            $h['id']    = $d['id'];
            $h['foto']  = $d['foto_calon'];
            $h['nama']  = $d['nama_calon'];
            $h['visi']  = $d['visi'];
            $h['misi']  = $d['misi'];
            $h['no']    = $no++;
            array_push($response['hasil'], $h);
        }
        echo json_encode($response);
    }

    var $table = "tbl_kelas";
    var $select_column = ['id', 'kelas'];
    var $order_column = [null, 'kelas'];

    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        $this->db->where('is_active', 1);
        if (isset($_POST['search']['value'])) {
            $this->db->like("kelas", $_POST['search']['value']);
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id', 'desc');
        }
    }

    function make_datatables($length, $start)
    {
        $this->make_query();
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

    function get_count_user($id)
    {
        return $this->db->get_where('tbl_user', ['kelas'=> $id])->num_rows();
    }

}

/* End of file Admin_model.php */
