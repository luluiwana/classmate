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

    public function getDisscussionById($Forum_ID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'user_course.CourseID=forum_question.CourseID');
        $this->db->join('users', 'forum_question.UserID=users.UserID');
        $this->db->where('user_course.UserID', $id);
        $this->db->where('forum_question.ForumQID', $Forum_ID);

        return $this->db->get('forum_question')->row();
    }

    public function getCommentsById($id)
    {
        $this->db->join('users', 'users.UserID=forum_answer.UserID');
        return $this->db->get_where('forum_answer', array('ForumQID' => $id))->result_object();
    }

    public function addComments($data)
    {
        $this->db->insert('forum_answer', $data);
    }

    public function getDiskusi($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'user_course.CourseID=forum_question.CourseID');
        $this->db->join('users', 'forum_question.UserID=users.UserID');
        
        $this->db->where('user_course.UserID', $id);
        $this->db->where('forum_question.CourseID', $CourseID);
        $this->db->order_by('ForumQID', 'desc');

        return $this->db->get('forum_question')->result();
    }
    public function getTopik($topik,$CourseID)
    {
         $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'user_course.CourseID=forum_question.CourseID');
        $this->db->join('users', 'forum_question.UserID=users.UserID');

        $this->db->where('user_course.UserID', $id);
        $this->db->where('forum_question.CourseID', $CourseID);
        $this->db->where('forum_question.category', $topik);
        $this->db->order_by('ForumQID', 'desc');
        
        return $this->db->get('forum_question')->result();

    }
    public function getCourseName($CourseID)
    {
        $this->db->where('CourseID', $CourseID);
        $row = $this->db->get('course')->row();
        return $row->CourseName;
        
    }
}
