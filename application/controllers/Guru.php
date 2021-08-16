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
        'isCourse'      =>$this->Course_model->isCourseGuru(),
        'courseList'    =>$this->Course_model->getCourseGuru()
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/dashboard');
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
}
        
    /* End of file  guru.php */
