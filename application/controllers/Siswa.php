<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
        if ($this->session->userdata('role') != 'siswa') {
            redirect('auth', 'refresh');
        }
    }


    public function index()
    {
        $data = array(
            'title'     => "Dashboard",
            'menu'      => "Dashboard",
            'courseList' => $this->Course_model->getCourseSiswa_limit(),
            'countCourse'=>$this->Course_model->countCourseSiswa(),
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/dashboard');
        $this->load->view('siswa/template/footer');
    }

    public function kelas()
    {
        $data = array(
            'title'     => "Kelas",
            'menu'      => "Kelas",
            'courseList' => $this->Course_model->getCourseSiswa()
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/course/kelas');
        $this->load->view('siswa/template/footer');

    }

    public function carikelas()
    {
        $data = array(
            'title' => 'Temukan Kelas',
            'menu'  => 'Kelas',
            'course' => $this->Course_model->getAllCourse(),
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/course/carikelas');
        $this->load->view('siswa/template/footer');
    }
    public function join($id)
    {
        $data = array(
            'UserID'    => $this->session->userdata('id_user'),
            'CourseID'  => $id
        );

        $this->db->insert('user_course', $data);

        redirect('siswa', 'refresh');
    }
    public function course($CourseID)
    {
         $data = array(
            'title'     => $this->Course_model->course($CourseID)->CourseName,
            'menu'      => 'Kelas',
            'course'    => $this->Course_model->course($CourseID),
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/course/course');
        $this->load->view('siswa/template/footer');
    }

    public function liveCode()
    {
        $data = array(
            'title' => "Live Code",
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/livecode');
        $this->load->view('siswa/template/footer');
    }

    public function discussion()
    {
        $data = array(
            'title' => "Diskusi",
            'topbar' => "Diskusi"
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/diskusi');
        $this->load->view('siswa/template/footer');
        # code...
    }
}

    
    /* End of file  siswa.php */
