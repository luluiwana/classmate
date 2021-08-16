<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => "Dashboard",
            'topbar' => "Dashboard"
        );
        $this->load->view('siswa/header', $data);
        $this->load->view('siswa/dashboard');
        $this->load->view('siswa/footer');
    }

    public function liveCode()
    {
        $data = array(
            'title' => "Live Code",
            'topbar' => "Live Code"
        );
        $this->load->view('siswa/header', $data);
        $this->load->view('siswa/livecode');
        $this->load->view('siswa/footer');
    }

    public function discussion()
    {
        $data = array(
            'title' => "Diskusi",
            'topbar' => "Diskusi"
        );
        $this->load->view('siswa/header', $data);
        $this->load->view('siswa/diskusi');
        $this->load->view('siswa/footer');
        # code...
    }
}

    
    /* End of file  siswa.php */
