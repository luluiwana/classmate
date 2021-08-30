<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
        $this->load->model('M_Discussion');
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
            'countCourse' => $this->Course_model->countCourseSiswa(),
            'user'        => $this->Course_model->getUser(),
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

        redirect('lesson/course/' . $id, 'refresh');
    }
    public function quit($CourseID)
    {
        $this->Course_model->quit($CourseID);

        redirect('siswa/kelas', 'refresh');
    }
  
    public function aktivitas($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->course($CourseID)->CourseName . ' - ' . $this->Course_model->course($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu'      => 'Aktivitas',
            'course'    => $this->Course_model->course($CourseID),
            'jml_siswa' => $this->Course_model->countSiswaByCourse($CourseID)

        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/course/course_menu');
        $this->load->view('siswa/course/aktivitas');
        $this->load->view('siswa/template/footer');
    }
    public function teman($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->course($CourseID)->CourseName . ' - ' . $this->Course_model->course($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu'      => 'Teman',
            'course'    => $this->Course_model->course($CourseID),
            'teman'     => $this->Course_model->teman($CourseID),
            'jml_siswa' => $this->Course_model->countSiswaByCourse($CourseID)
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/course/course_menu');
        $this->load->view('siswa/course/teman');
        $this->load->view('siswa/template/footer');
    }
    public function informasi($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->course($CourseID)->CourseName . ' - ' . $this->Course_model->course($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu'      => 'Informasi',
            'course'    => $this->Course_model->course($CourseID),
            'jml_siswa' => $this->Course_model->countSiswaByCourse($CourseID)

        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/course/course_menu');
        $this->load->view('siswa/course/informasi');
        $this->load->view('siswa/template/footer');
    }

    public function liveCode()
    {
        $data = array(
            'title' => "Live Code",
            'menu'  => 'Live Code',
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/livecode');
        $this->load->view('siswa/template/footer');
    }
}

    
    /* End of file  siswa.php */
