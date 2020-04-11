<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function index()
    {
        switch ($this->session->userdata('role')) {
            case 'pemilih':
                $this->session->unset_userdata('NIS');
                $this->session->unset_userdata('nama');
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('role');
                $this->session->unset_userdata('status');
                $this->session->set_flashdata('message', '<div class="alert alert-success">Anda Berhasil Logout</div>');
                redirect('auth');
                break;
            case 'admin':
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('role');
                $this->session->unset_userdata('status');
                $this->session->set_flashdata('message', '<div class="alert alert-success">Anda Berhasil Logout</div>');
                redirect('administrator');
                break;
            default:
                # code...
                break;
        }
    }

}

/* End of file Logout.php */
