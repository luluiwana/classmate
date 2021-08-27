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

  // ------------------------------------------------------------------------

}

/* End of file M_Quiz_model.php */
/* Location: ./application/models/M_Quiz_model.php */