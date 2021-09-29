<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model M_Quiz_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class M_Quiz extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getQuizByID($id)
  {
    return $this->db->get_where('quiz_question', array('QuizID' => $id))->result_object();
  }

  public function createQuiz($data)
  {
    $this->db->insert('quiz', $data);
    return $this->db->insert_id();
  }

  public function createQuestion($insert_data)
  {
    $this->db->insert('quiz_question', $insert_data);
  }

  public function saveQuestion($insert_data, $QuizID)
  {
    $this->db->insert('quiz_question', $insert_data);
    // $QuizID = $insert_data['QuizID'];

    $raw = $this->getQuizCount($QuizID);
    $jumlah = $raw->jumlah;
    (float)$total = 100 / $jumlah . (float)$jumlah;
    $updateSkor = array('Score' => $total);
    $this->db->update('quiz_question', $updateSkor, array('QuizID' => $QuizID));
  }

  public function getQuizCount($QuizID)
  {
    $this->db->select('Count(QuizID) as jumlah ');
    return $this->db->get_where('quiz_question', array('QuizID' => $QuizID))->row_object();
  }

  public function getListQuestionByQuizID($QuizID)
  {
    return $this->db->get_where('quiz_question', array('QuizID' => $QuizID))->result_array();
  }

  public function EditQuestion($insert_data, $QuestionID)
  {
    // $this->db->insert('quiz_question', $insert_data);
    // $QuizID = $insert_data['QuizID'];


    // $insert_data .= ['Score' => $total];
    $this->db->update('quiz_question', $insert_data, array('QuestionID' => $QuestionID));
  }

  public function getDetailQuestion($QuestionID)
  {
    return $this->db->get_where('quiz_question', array('QuestionID' => $QuestionID))->row_array();
  }

  // ------------------------------------------------------------------------
  public function getQuiz($QuizID)
  {
    // SELECT * FROM `quiz` INNER JOIN Competencies ON  INNER JOIN user_course ON  WHERE QuizID=1 AND =1
    $id = $this->session->userdata('id_user');
    $this->db->join('Competencies', 'competencies.CompetenciesID=quiz.CompetenciesID');
    $this->db->join('user_course', 'competencies.CourseID=user_course.CourseID');
    $this->db->where('QuizID', $QuizID);
    $this->db->where('user_course.UserID', $id);
    return $this->db->get('quiz')->row();
  }
  public function countQuestion($QuizID)
  {
    // SELECT COUNT(QuestionID) FROM `quiz_question` WHERE QuizID=1
    $this->db->select('COUNT(*) as jml');
    $this->db->where('QuizID', $QuizID);
    $row = $this->db->get('quiz_question')->row();
    return $row->jml;
  }

}

/* End of file M_Quiz_model.php */
/* Location: ./application/models/M_Quiz_model.php */