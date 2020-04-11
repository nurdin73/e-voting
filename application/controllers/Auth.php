<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('role') == 'pemilih') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Sudah Login</div>');
            redirect('main');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|is_numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $conn = mysqli_connect('localhost', 'root', '', 'db_voting');
            $nama = mysqli_real_escape_string($conn, $this->input->post('nama'));
            $pass = mysqli_real_escape_string($conn, $this->input->post('pass'));
            $queryUser = $this->db->get_where('tbl_user', ['nama_lengkap' => $nama])->row_array();
            if ($queryUser) {
                if (password_verify($pass, $queryUser['password'])) {
                    
                    $array = array(
                        'nama'      => $queryUser['nama_lengkap'],
                        'NIS'      => $queryUser['NIS'],
                        'status'    => $queryUser['status'],
                        'role'      => 'pemilih'
                    );
                    
                    $this->session->set_userdata( $array );
                    redirect('main');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf Password Yang Anda Masukan Salah!</div>');
                    redirect('auth'); 
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf Nama Yang Anda Masukan Salah!</div>');
                redirect('auth');  
            }
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('NIS');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Anda Berhasil Logout</div>');
        redirect('auth');
    }

    // public function register()
    // {
    //     $data = [
    //         'nama_lengkap'  => 'Nurdin',
    //         'password'      => password_hash('161710524', PASSWORD_DEFAULT),
    //         'kelas'         => 'XII Teknik Komputer Jaringan 1',
    //         'status'        => 0 
    //     ];
        
    //     $this->db->insert('tbl_user', $data);
        
    // }
}

/* End of file Auth.php */
