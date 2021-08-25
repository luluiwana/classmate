<?php
        
defined('BASEPATH') or exit('No direct script access allowed');
        
class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role')!="guru") {
            redirect('auth', 'refresh');
        }
        $this->load->model('Course_model');
        
    }

    public function index()
    {
        $data = array(
        'title'         =>"Dashboard",
        'menu'          =>"Dashboard",
        'courseList'    =>$this->Course_model->getCourseGuru_limit(),
        'countCourse'   =>$this->Course_model->countCourseGuru(),
        'countSiswa'    =>$this->Course_model->countSiswa(),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/dashboard');
        $this->load->view('guru/template/footer');
    }
    public function kelas()
    {
         $data = array(
        'title'         =>"Kelas",
        'menu'          =>"Kelas",
        'courseList'    =>$this->Course_model->getCourseGuru()
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/kelas');
        $this->load->view('guru/template/footer');
    }
    public function buatkelas()
    {
        $data = array(
        'title'         =>"Buat Kelas",
        'menu'          =>"Kelas",
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/buat_kelas');
        $this->load->view('guru/template/footer');
    }
    public function addkelas()
    {
        $config['upload_path']          = './media/logo';
        $config['allowed_types']        = 'jpg|png|jpeg';;
        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('CourseLogo')) {
            echo $this->upload->display_errors();
            redirect('guru/buatkelas', 'refresh');
        } else {
            $data = array(
            'CourseName'    => $this->input->post('CourseName'),
            'ClassName'     => $this->input->post('ClassName'),
            'SchoolName'    => $this->input->post('SchoolName'),
            'TeacherID'    => $this->session->userdata('id_user'),
            'CourseLogo'=>$this->upload->data('file_name'),
            );
            $this->db->insert('course', $data);
        }
        redirect('guru', 'refresh');
    }
    public function editkelas($CourseID)
    {
        $config['upload_path']          = './media/logo';
        $config['allowed_types']        = 'jpg|png|jpeg';;
        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('CourseLogo')) {
             $data = array(
            'CourseName'    => $this->input->post('CourseName'),
            'ClassName'     => $this->input->post('ClassName'),
            'SchoolName'    => $this->input->post('SchoolName'),
            'TeacherID'    => $this->session->userdata('id_user'),
            );
            $this->Course_model->updateKelas($CourseID,$data);
            
        } else {
            $data = array(
            'CourseName'    => $this->input->post('CourseName'),
            'ClassName'     => $this->input->post('ClassName'),
            'SchoolName'    => $this->input->post('SchoolName'),
            'TeacherID'    => $this->session->userdata('id_user'),
            'CourseLogo'=>$this->upload->data('file_name'),
            );
            $old_logo = $this->Course_model->getOldLogo($CourseID);
            $this->Course_model->updateKelas($CourseID, $data);
            unlink('./media/logo/'.$old_logo); // This is an absolute path to the file

        }
        redirect('guru/pengaturan/'.$CourseID, 'refresh');
    }
    public function hapuskelas($CourseID)
    {
        $old_logo = $this->Course_model->getOldLogo($CourseID);
        unlink('./media/logo/'.$old_logo); // This is an absolute path to the file
        $this->Course_model->deleteCourse($CourseID);
        
        redirect('guru/kelas','refresh');
        
    }
    public function kick($CourseID,$UserID)
    {
        $this->Course_model->kick($CourseID,$UserID);
        
        redirect('guru/siswa/'.$CourseID,'refresh');
        
    }
    public function course($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName." - ".$this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu'=>"Kelas",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/course');
        $this->load->view('guru/template/footer');
    }
    public function aktivitas($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName." - ".$this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu'=>"Aktivitas",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/aktivitas');
        $this->load->view('guru/template/footer');
    }
    public function rekap($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName." - ".$this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu'=>"Rekap Nilai",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/rekap_nilai');
        $this->load->view('guru/template/footer');
    }
      public function siswa($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName." - ".$this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu'=>"Daftar Siswa",
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'siswa'     => $this->Course_model->getSiswaByCourse($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/daftar_siswa');
        $this->load->view('guru/template/footer');
    }
    public function pengaturan($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName." - ".$this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Pengaturan',
            'course_menu'=>"Pengaturan",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');

        $this->load->view('guru/course/pengaturan');
        $this->load->view('guru/template/footer');
    }
}
        
    /* End of file  guru.php */
