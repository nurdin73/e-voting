<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') == 'pemilih') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Access Forbidden</div>');
            redirect('main','refresh');
        }
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Silahkan Login Terlebih Dahulu</div>');
            redirect('administrator','refresh');
        }
        $this->load->model('admin_model', 'a');
        $this->load->model('class_model', 'c');
    }
    

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $data['siswa']= $this->db->get('tbl_user')->num_rows();
        $data['voting']= $this->db->get('voting')->num_rows();
        $data['calon']= $this->db->get('tbl_calon')->result_array();
        $data['menu'] = $this->a->menu();
        $data['apk'] = $this->a->apk();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer', $data);
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

    public function calon()
    {
        $data['subtitle'] = 'Master';
        $data['calon']= $this->db->get('tbl_calon')->result_array();
        $data['menu'] = $this->a->menu();
        $data['apk'] = $this->a->apk();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['username' => $this->session->userdata('username')])->row_array();
        switch ($this->uri->segment(3)) {
            case 'add':
                $data['title'] = 'Tambah Calon';
                $this->load->view('template/header', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('admin/tambah-calon', $data);
                $this->load->view('template/footer', $data);
                break;
            case 'adds':
                $nama = $this->input->post('nama_paslon');
                $visi = $this->input->post('visi');
                $misi = $this->input->post('misi');
                $file = $_FILES['foto']['name'];
        

                $config['file_name'] = time();
                $config['upload_path'] = './assets/dist/img/img-calon/';
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('foto')){
                    $error = array('error' => $this->upload->display_errors()); 
                }
                else{
                    $img = $this->upload->data('file_name');
                    $data = [
                        'foto_calon'        => $img,
                        'nama_calon'        => trim($nama),
                        'visi'              => trim($visi),
                        'misi'              => trim($misi),
                        'jumlah_voting'     => 0
                    ];
                    $this->db->insert('tbl_calon', $data);
                }
                break;
            case 'delete':
                $id = decrypt_url($this->input->get('id'));
                $this->a->deletePaslon($id);
                break;
            case 'update':
                $id = $this->input->post('id');
                $foto = $_FILES['userfile']['name'];
                $nama = $this->input->post('nama');
                $visi = $this->input->post('visi');
                $misi = $this->input->post('misi');
                
                if ($foto != '') {
                    $config['file_name'] = time();
                    $config['upload_path'] = './assets/dist/img/img-calon/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    
                    $this->load->library('upload', $config);
                    
                    if ( ! $this->upload->do_upload('userfile')){
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else{
                        $query = $this->db->get_where('tbl_calon', ['id' => $id])->row_array();
                        if ($foto != 'default.jpg') {
                            unlink( FCPATH . 'assets/dist/img/img-calon/' . $query['foto_calon']);
                        }
                        $data = $this->upload->data('file_name');
                        $this->db->set('foto_calon', $data);
                    }
                } else {
                    $query = $this->db->get_where('tbl_calon', ['id' => $id])->row_array();
                    $this->db->set('foto_calon', $query['foto_calon']);
                }

                $this->db->set('nama_calon', $nama);
                $this->db->set('visi', $visi);
                $this->db->set('misi', $misi);
                $this->db->where('id', $id);
                $this->db->update('tbl_calon');
                break;    
            default:
                # code...
                break;
        }
        $data['title'] = 'Data Calon';
        $data['subtitle'] = 'Master';
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data-calon', $data);
        $this->load->view('template/footer', $data);
    }

    public function detailCalon()
    {
        $id = decrypt_url($this->input->get('id'));
        $this->a->detailPaslon($id);
    }

    public function pemilih()
    {
        $data['title'] = 'Data Pemilih';
        $data['subtitle'] = 'Master';
        $data['menu'] = $this->a->menu();
        $data['apk'] = $this->a->apk();
        $data['user'] = $this->db->get_where('tbl_pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/data-pemilih', $data);
        $this->load->view('template/footer', $data);
    }

    public function dataPemilih()
    {
        $draw = intval($this->input->post('draw'));
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $fetch_data = $this->a->make_datatables($length, $start);
        $data = [];
        $no = 1;
        foreach ($fetch_data as $row) {
            $id = $row->id;
            $sub_array = [];
            $sub_array[] = $no++;
            $sub_array[] = $this->a->get_count_user($id);
            $sub_array[] = $row->kelas;
            $sub_array[] = '<button type="button" data-toggle="modal" data-target="#modalView" data-id="'.encrypt_url($row->id).'" name="detail" class="btn btn-xs btn-primary detail"><i class="fa fa-fw fa-book"></i>Detail</button>';
            $sub_array[] = '<button type="button" data-id="'.encrypt_url($row->id).'" name="hapus" class="btn btn-xs btn-danger delete"><i class="fa fa-fw fa-trash"></i>Delete</button>';
            $data[] = $sub_array;
        }
        $output = [
            "draw" => $draw,
            "recordsTotal" => $this->a->get_all_data(),
            "recordsFiltered" => $this->a->get_filtered_data(),
            "data" => $data
        ];

        echo json_encode($output);
    }

    public function action()
    {
        $action = $this->uri->segment(3);
        $this->load->model('peserta_model', 'p');
        switch ($action) {
            case 'delete':
                $result = $this->c->delete_class($this->input->get('id'));
                echo json_encode($result);
                break;
            case 'detail':
                $draw = intval($this->input->post('draw'));
                $start = $this->input->post('start');
                $length = $this->input->post('length');
                $kelas = decrypt_url($this->input->post('id'));
                $fetch_data = $this->p->make_datatables($length, $start, $kelas);
                $data = [];
                $no = 1;
                foreach ($fetch_data as $row) {
                    $status = $row->status == 1 ? '<button type="button"class="btn btn-xs btn-success disabled">Sudah Memilih</button>' : '<button type="button"class="btn btn-xs btn-warning disabled">Belum Memilih</button>';
                    $id = $row->id;
                    $sub_array = [];
                    $sub_array[] = $no++;
                    $sub_array[] = $row->NIS;
                    $sub_array[] = $row->nama_lengkap;
                    $sub_array[] = $status;
                    $data[] = $sub_array;
                }
                $output = [
                    "draw" => $draw,
                    "recordsTotal" => $this->a->get_all_data(),
                    "recordsFiltered" => $this->a->get_filtered_data(),
                    "data" => $data
                ];
                echo json_encode($output);
                break;
            
            default:
                # code...
                break;
        }
    }

}

/* End of file Admin.php */
