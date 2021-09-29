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
        $this->load->model('Course_model');
        $this->load->model('M_Discussion');
        $this->load->model('M_Quiz', 'quiz');
        if ($this->session->userdata('role') != 'siswa') {
            redirect('auth', 'refresh');
        }
    }

    public function Quiz_detail($quizID, $CourseID)
    {
        $data = array(
      'title' => "Quiz",
      'menu'  => 'Kelas',
      'CourseID'=>$CourseID,
      'quiz'=>$this->quiz->getQuiz($quizID),
      'jmlsoal'=>$this->quiz->countQuestion($quizID)
    );
        $data['question'] = $this->quiz->getQuizByID($quizID);

        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/quiz/quiz_detail');
        $this->load->view('siswa/template/footer');
    }

    public function QuizResult($quizID,$CourseID)
    {
        //   $data = $this->quiz->getQuizByID($quizID);
        //   $jmlsoal = $this->input->post('count');
        //   $score=0;
        //   foreach ($data as $row) {
        //     // echo $this->input->post('pertanyaan' . $row->QuestionID);
        //     if ($row->TrueOption == $this->input->post('pertanyaan' . $row->QuestionID)) {
        //       print_r('pilihan kamu ' . $this->input->post('pertanyaan' . $row->QuestionID) . 'Benar');
        //       echo '<br>';
        //       $score++;
        //     } else {
        //       print_r('pilihan kamu ' . $this->input->post('pertanyaan' . $row->QuestionID) . 'Salah. Pilihan yang benar ' . $row->TrueOption);
        //       echo '<br>';
        //     }
        //   }
        //   $nilai=$score/$jmlsoal*100;
        //   print_r($nilai);
        // }
      $data = array(
      'title' => "Hasil Quiz",
      'menu'  => 'Kelas',
      'CourseID'=>$CourseID,
      'quiz'=>$this->quiz->getQuiz($quizID),
      'jmlsoal'=>$this->quiz->countQuestion($quizID)
    );
        $data['question'] = $this->quiz->getQuizByID($quizID);

        $this->load->view('siswa/template/header', $data);
        $this->load->view('siswa/quiz/quiz_result');
        $this->load->view('siswa/template/footer');
    }
}


/* End of file Quiz.php */
/* Location: ./application/controllers/Quiz.php */