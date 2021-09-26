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
    public function editDiscussion($ForumQID, $data)
    {
        $this->db->where('forum_question.ForumQID', $ForumQID);
        $this->db->update('forum_question', $data);
    }
    public function updateComment($ForumAID, $data)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('ForumAID', $ForumAID);
        $this->db->where('UserID', $id);
        $this->db->update('forum_answer', $data);
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
    public function getComment($ForumAID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('ForumAID', $ForumAID);
        $this->db->where('UserID', $id);
        return $this->db->get('forum_answer')->row();
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
    public function getTopik($topik, $CourseID)
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
    public function deleteThread($ForumQID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('UserID', $id);
        $this->db->where('ForumQID', $ForumQID);
        $this->db->delete('forum_question');
    }
    public function deleteComments($ForumQID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('ForumQID', $ForumQID);
        $this->db->delete('forum_answer');
    }
    public function deleteComment($ForumAID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('ForumAID', $ForumAID);
        $this->db->where('UserID', $id);
        $this->db->delete('forum_answer');
    }
}
