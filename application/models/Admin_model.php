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

    
}

/* End of file Admin_model.php */
