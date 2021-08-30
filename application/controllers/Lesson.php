<?php
        
defined('BASEPATH') or exit('No direct script access allowed');
        
class Lesson extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'siswa') {
            redirect('auth', 'refresh');
        }
        $this->load->model('Course_model');
        $this->load->model('M_Lesson');
        
    }
    public function course($CourseID)
    {
         $data = array(
            'title'     => $this->Course_model->course($CourseID)->CourseName,
            'menu'      => 'Kelas',
            'course_menu'      => 'Kelas',
            'course'    => $this->Course_model->course($CourseID),
            'jml_siswa' => $this->Course_model->countSiswaByCourse($CourseID),
            'kd'        => $this->M_Lesson->getCompetency($CourseID),
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/course/course_menu');
        $this->load->view('siswa/course/course');
        $this->load->view('siswa/template/footer');
    }
    public function study($LessonID)
    {
        $data = array(
            'title'     => $this->M_Lesson->getLesson($LessonID)->LessonTitle,
            'menu'      => "Kelas",
           'lesson'  => $this->M_Lesson->getLesson($LessonID),
        );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/materi');
        $this->load->view('siswa/template/footer');
    }
}
        
    /* End of file  Lesson.php */