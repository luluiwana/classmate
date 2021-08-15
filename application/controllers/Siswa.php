<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Siswa extends CI_Controller {

public function index()
{
    $data = array(
        'title'=>"Dashboard"
    );
    $this->load->view('siswa/header',$data);
    $this->load->view('siswa/dashboard');
    $this->load->view('siswa/footer');
}
        
}
        
    /* End of file  siswa.php */
        
                            