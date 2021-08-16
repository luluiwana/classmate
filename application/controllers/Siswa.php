<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
        if ($this->session->userdata('role')!='siswa') {
            redirect('auth', 'refresh');
        }
    }
    

    public function index()
    {
        $data = array(
            'title'     => "Dashboard",
            'menu'      => "Dashboard",
            'isCourse'  =>$this->Course_model->isCourse(),
            'courseList'=>$this->Course_model->getCourseSiswa()
        );
        $this->load->view('siswa/header', $data);
        $this->load->view('siswa/dashboard');
        $this->load->view('siswa/footer');
    }

    public function carikelas()
    {
        $data = array(
            'title' => 'Temukan Kelas',
            'menu'  => 'Kelas',
            'course'=> $this->Course_model->getAllCourse(),
        );
        $this->load->view('siswa/header', $data);
        $this->load->view('siswa/carikelas');
        $this->load->view('siswa/footer');
    }
    public function join($id)
    {
        $data = array(
            'UserID'    => $this->session->userdata('id_user'),
            'CourseID'  => $id
        );
        
        $this->db->insert('user_course', $data);
        
        redirect('siswa','refresh');
        
        
    }

    public function liveCode()
    {
        $data = array(
            'title' => "Live Code",
        );
        $this->load->view('siswa/header', $data);
        $this->load->view('siswa/livecode');
        $this->load->view('siswa/footer');
    }
}

    
    /* End of file  siswa.php */
