<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Discussion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addDiscussion($data)
    {
        $this->db->insert('forum_question', $data);
    }

    public function getDisscussionById($id)
    {
        return $this->db->get_where('forum_question', array('ForumQID' => $id))->row_object();
    }

    public function getCommentsById($id)
    {
        $this->db->select('*');
        $this->db->join('users', 'users.UserID=forum_answer.UserID');
        return $this->db->get_where('forum_answer', array('ForumQID' => $id))->result_object();
    }

    public function addComments($data)
    {
        $this->db->insert('forum_answer', $data);
    }

    public function getDiskusi()
    {
        return $this->db->get('forum_question')->result_object();
    }
}
