<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Discussion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Discussion');
        $this->load->model('Course_model');
        if (($this->session->userdata('role')) != 'siswa' && ($this->session->userdata('role')) != 'guru') {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $data = array(
      'title' => "Diskusi",
      'menu'  => 'Diskusi',
      'courseList' => $this->Course_model->getCourseSiswa()
    );
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/diskusi/diskusi');
        $this->load->view('siswa/template/footer');
        # code...
    }
    public function all($CourseID)
    {
        $data = array(
      'title' => "Semua Topik",
      'menu'  => 'Diskusi',
      'course_id'=>$CourseID,
      'CourseName'=>$this->M_Discussion->getCourseName($CourseID),
    );
        date_default_timezone_set('Asia/Jakarta');
        $data['diskusi'] = $this->M_Discussion->getDiskusi($CourseID);
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/diskusi/lihat_diskusi');
        $this->load->view('siswa/template/footer');
        # code...
    }
    public function topik($topik, $CourseID)
    {
        $data = array(
      'title' => $topik,
      'menu'  => 'Diskusi',
      'course_id'=>$CourseID,
      'CourseName'=>$this->M_Discussion->getCourseName($CourseID),
    );

        $data['diskusi'] = $this->M_Discussion->getTopik($topik, $CourseID);
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/diskusi/lihat_diskusi');
        $this->load->view('siswa/template/footer');
        # code...
    }
    public function detail_discussion($id, $CourseID)
    {
        $data = array(
      'title' => "Diskusi",
      'menu'  => 'Diskusi',
      'CourseName'=>$this->M_Discussion->getCourseName($CourseID),
      'CourseID'=>$CourseID
    );

        $data['thread'] = $this->M_Discussion->getDisscussionById($id);
        $data['comments'] = $this->M_Discussion->getCommentsById($id);
        $data['session'] = $this->session->userdata('id_user');

        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/diskusi/detail_diskusi');
        $this->load->view('siswa/template/footer');
        # code...
    }

    public function addDataDiskusi()
    {
        $CourseID = $this->input->post('courseid');
        $insert_data = [
      // 'ForumQtitle' => $this->input->post('judul'),
      'CourseID' => $CourseID,
      'ForumQContent' => $this->input->post('content'),
      'UserID' =>  $this->session->userdata('id_user'),
      'Category' => $this->input->post('kategori'),
      // 'CreatedDateTime'=>Date('Y-m-d h:i:s')
    ];
        $this->M_Discussion->addDiscussion($insert_data);
        redirect('discussion/all/'.$CourseID);
    }

    public function addComments($ForumQID)
    {
        $insert_data = [

      'ForumAContent' => $this->input->post('content'),
      'UserID' =>  $this->session->userdata('id_user'),
      'ForumQID' =>  $ForumQID,

    ];
        $CourseID = $this->input->post('CourseID');
        $this->M_Discussion->addComments($insert_data);
        redirect('discussion/detail_discussion/' . $ForumQID.'/'.$CourseID);
    }
    public function delete($ForumQID, $CourseID)
    {
        $this->M_Discussion->deleteThread($ForumQID);
        $this->M_Discussion->deleteComments($ForumQID);
        redirect('discussion/all/'.$CourseID, 'refresh');
    }
    public function deletecomment($CourseID, $ForumQID, $ForumAID)
    {
        $this->M_Discussion->deleteComment($ForumAID);
        redirect('discussion/detail_discussion/'.$ForumQID.'/'.$CourseID, 'refresh');
    }
    public function editDiskusi($ForumQID, $CourseID)
    {
        $data = array(
          'title' => "Edit Diskusi",
          'menu'  => 'Diskusi',
          'CourseName'=>$this->M_Discussion->getCourseName($CourseID),
          'CourseID'=>$CourseID
        );
        $data['thread'] = $this->M_Discussion->getDisscussionById($ForumQID);
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/diskusi/edit_diskusi');
        $this->load->view('siswa/template/footer');
        # code...
    }
    public function editdiskusi__($ForumQID, $CourseID)
    {
        $data = [
          'ForumQContent' => $this->input->post('content'),
          'Category' => $this->input->post('kategori'),
        ];
        $this->M_Discussion->editDiscussion($ForumQID, $data);
        redirect('discussion/detail_discussion/'.$ForumQID.'/'.$CourseID, 'refresh');
    }
     public function editKomentar($ForumAID, $ForumQID, $CourseID)
    {
        $data = array(
          'title' => "Edit Komentar",
          'menu'  => 'Diskusi',
          'CourseName'=>$this->M_Discussion->getCourseName($CourseID),
          'CourseID'=>$CourseID
        );
        $data['thread'] = $this->M_Discussion->getDisscussionById($ForumQID);
        $data['comment'] = $this->M_Discussion->getComment($ForumAID);
        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/diskusi/edit_komentar');
        $this->load->view('siswa/template/footer');
        # code...
    }
     public function editcomment__($ForumAID,$ForumQID, $CourseID)
    {
        $data = [
          'ForumAContent' => $this->input->post('content'),
        ];
        $this->M_Discussion->updateComment($ForumAID, $data);
        redirect('discussion/detail_discussion/'.$ForumQID.'/'.$CourseID, 'refresh');
    }
    
}


/* End of file Disscussion.php */
/* Location: ./application/controllers/Disscussion.php */
