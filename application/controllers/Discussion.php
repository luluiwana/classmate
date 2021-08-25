<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Discussion extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_Discussion');
    if (($this->session->userdata('role')) != 'siswa' && ($this->session->userdata('role')) != 'guru') {
      redirect('auth', 'refresh');
    }
  }

  public function index()
  {
    $data = array(
      'title' => "Diskusi",
      'menu'  => 'Diskusi',
    );

    $data['diskusi'] = $this->M_Discussion->getDiskusi();


    $this->load->view('siswa/template/header', $data);
    $this->load->view('siswa/diskusi/lihat_diskusi');
    $this->load->view('siswa/template/footer');
    # code...
  }
  public function detail_discussion($id)
  {
    $data = array(
      'title' => "Diskusi",
      'menu'  => 'Diskusi',
    );

    $data['thread'] = $this->M_Discussion->getDisscussionById($id);
    $data['comments'] = $this->M_Discussion->getCommentsById($id);
    $data['session'] = $this->session->userdata('id_user');

    $this->load->view('siswa/template/header', $data);
    $this->load->view('siswa/diskusi/detail_diskusi');
    $this->load->view('siswa/template/footer');
    # code...
  }

  public function add_discussion()
  {
    $data = array(
      'title' => "Tambah Diskusi",
      'menu'  => 'Diskusi',
    );
    $this->load->view('siswa/template/header', $data);
    $this->load->view('siswa/diskusi/add_diskusi');
    $this->load->view('siswa/template/footer');
    # code...
  }

  public function addDataDiskusi()
  {
    $insert_data = [
      'ForumQtitle' => $this->input->post('judul'),
      'ForumQContent' => $this->input->post('content'),
      'UserID' =>  $this->session->userdata('id_user'),
      'Category' => $this->input->post('kategori')
    ];
    $this->M_Discussion->addDiscussion($insert_data);
    redirect('siswa/discussion');
  }

  public function addComments($id_comment)
  {
    $insert_data = [

      'ForumAContent' => $this->input->post('content'),
      'UserID' =>  $this->session->userdata('id_user'),
      'ForumQID' =>  $id_comment,

    ];
    $this->M_Discussion->addComments($insert_data);
    redirect('discussion/detail_discussion/' . $id_comment);
  }
}


/* End of file Disscussion.php */
/* Location: ./application/controllers/Disscussion.php */