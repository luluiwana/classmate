<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Quiz
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Quiz extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function Quiz_detail($courseID, $quizID)
  {
    $data = array(
      'title' => "Quiz",
      'menu'  => 'Quiz',
    );
    $this->load->view('siswa/template/header', $data);
    $this->load->view('siswa/quiz/quiz_detail');
    $this->load->view('siswa/template/footer');
  }
}


/* End of file Quiz.php */
/* Location: ./application/controllers/Quiz.php */