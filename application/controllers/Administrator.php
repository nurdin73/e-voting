<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') == 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Sudah Login</div>');
            redirect('admin');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $conn           = mysqli_connect('localhost', 'root', '', 'db_voting');
            $username       = mysqli_real_escape_string($conn, $this->input->post('username'));
            $password       = mysqli_real_escape_string($conn, $this->input->post('password'));
            $queryPengguna  = $this->db->get_where('tbl_pengguna', ['username' => $username])->row_array();
            if ($queryPengguna) {
                if (password_verify($password, $queryPengguna['password'])) {
                    
                    $array = array(
                        'username'      => $queryPengguna['username'],
                        'role'          => 'admin',
                        'status'        => 1
                    );
                    
                    $this->session->set_userdata( $array );
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf Password Yang Anda Masukan Salah!</div>');
                    redirect('administrator'); 
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf Username Yang Anda Masukan Salah!</div>');
                redirect('administrator');  
            }
        }
        
    }

    // public function addUser()
    // {
    //     $data = [
    //         'email'         => 'nurdin.reverse73@gmail.com',
    //         'username'      => 'nurdin73',
    //         'password'      => password_hash('semangat', PASSWORD_DEFAULT),
    //         'foto'          => 'default.jpg',
    //         'role'          => 'admin' 
    //     ];
        
    //     $this->db->insert('tbl_pengguna', $data);
    // }

}

/* End of file Administrator.php */
