<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'a');
        $this->load->helper('Security_helper');
        if (!$this->session->userdata('role') == 'pemilih') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Silahkan Login Terlebih Dahulu!</div>');
            redirect('auth');
        }
        if ($this->session->userdata('role') == 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Access Forbidden</div>');
            redirect('admin');
        }
    }
    
    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['nama_lengkap' => $this->session->userdata('nama')])->row_array();
        $this->load->view('main/page1', $data);
    }
    public function edit()
    {
        $checkUser = $this->db->get_where('tbl_user', ['NIS' => $this->session->userdata('NIS')])->row_array();
        if ($checkUser['status'] == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Terjadi Kesalahan!</div>');
            redirect('main');
        }
        $this->form_validation->set_rules('NIS', 'NIS', 'trim|required|is_numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('kelas', 'Nama', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('tbl_user', ['id' => $this->uri->segment(3)])->row_array();
            $this->load->view('main/edit', $data);
        } else {
            $NIS = htmlspecialchars($this->input->post('NIS'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $kelas = htmlspecialchars($this->input->post('kelas'));
            $data = [
                'NIS'           => $NIS,
                'nama_lengkap'  => $nama,
                'kelas'         => $kelas
            ];
            $id = $this->uri->segment(3);
            $this->db->where('id', $id);
            $this->db->update('tbl_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Diri Berhasil Di Update</div>');
            redirect('main');  
        }
        
    }
    public function voting()
    {
        //$checkVoting = $this->db->get_where('voting', ['NIS' => $this->session->userdata('NIS')])->row_array();
        $checkUser  = $this->db->get_where('tbl_user', ['NIS' => $this->session->userdata('NIS')])->row_array();
        if ($checkUser['status'] == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Terjadi Kesalahan!</div>');
            redirect('main');
        }
        $data['calon']= $this->db->get('tbl_calon')->result_array();
        $data['user'] = $this->db->get_where('tbl_user', ['nama_lengkap' => $this->session->userdata('nama')])->row_array();
        $this->load->view('main/voting', $data);
    }

    public function end()
    {
        $id     = $this->input->post('id');
        $checkCalon = $this->db->get_where('tbl_calon', ['id' => $id])->row_array();
        $jumlah = $checkCalon['jumlah_voting'] + 1;
        $NIS    = $this->input->post('NIS');
        $data = [
            'NIS'       => $NIS
        ];
        $this->db->insert('voting', $data);
        $this->db->update('tbl_user', ['status' => 1], ['NIS' => $NIS]);
        $this->db->update('tbl_calon', ['jumlah_voting' => $jumlah], ['id' => $id]);
    }
    public function dashboard()
    {
        $data['siswa']= $this->db->get('tbl_user')->num_rows();
        $data['voting']= $this->db->get('voting')->num_rows();
        $data['calon']= $this->db->get('tbl_calon')->result_array();
        $data['user'] = $this->db->get_where('tbl_user', ['nama_lengkap' => $this->session->userdata('nama')])->row_array();
        $this->load->view('main/dashboard', $data);
    }

    public function dataChart()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'db_voting');
        $query = "SELECT * FROM tbl_calon";
        $querydata = mysqli_query($conn, $query);
        if (mysqli_num_rows($querydata) > 0) {
            $response = [];
            $response['response'] = "true";
            $response['hasil'] = [];
            while ($data = mysqli_fetch_array($querydata)) {
                $h['nama'] = $data['nama_calon'];
                $h['jumlah'] = $data['jumlah_voting'];
                array_push($response['hasil'], $h);
            }
            echo json_encode($response);
        } else {
            $response['message']= "Belum Ada Pemilih!";
	        echo json_encode($response);
        }
    }
    public function getJson()
    {
        $data = $this->db->get('tbl_calon')->result();
        echo json_encode($data);
    }

    public function check()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'db_voting');
        $NIS = $this->input->get('NIS');
        $query = "SELECT * FROM voting WHERE NIS='$NIS'";
        $querydata = mysqli_query($conn, $query);
        if (mysqli_num_rows($querydata) > 0) {
            $hasil = ['response' => 'Sudah Memilih'];
            echo json_encode($hasil);
        } else {
            $hasil = ['response' => 'Belum Memilih'];
            echo json_encode($hasil);
        }
    }

    public function details()
    {
        $id = decrypt_url($this->input->get('id'));
        $this->a->detailPaslon($id);
    }

}

/* End of file Main.php */
