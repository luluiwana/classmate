<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{
    public function countCourseSiswa()
    {
        $id = $this->session->userdata('id_user');
        $this->db->from('course');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('user_course.UserID', $id);
        return $this->db->count_all_results();
    }
    public function countCourseGuru()
    {
        $id = $this->session->userdata('id_user');
        $this->db->from('course');
        $this->db->where('TeacherID', $id);
        return $this->db->count_all_results();
        ;
    }
    public function countSiswa()
    {
        // SELECT * FROM course INNER JOIN user_course ON course.CourseID=user_course.CourseID WHERE course.TeacherID=2
        $id = $this->session->userdata('id_user');
        
        $this->db->select('user_course.UserID');
        $this->db->from('course');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('course.TeacherID', $id);
        $this->db->group_by('user_course.UserID');
        return $this->db->count_all_results();
    }

    public function getCourseGuru_limit()
    // get course created by teacher limit 6
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->limit(6);
        
        $this->db->order_by('CourseID', 'desc');
        
        return $this->db->get('course')->result();
    }
    public function getCourseSiswa_limit()
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('user_course.UserID', $id);
        $this->db->limit(6);
        $this->db->order_by('user_course.JoinDate', 'desc');
        return $this->db->get('course')->result();
    }
    public function getCourseGuru()
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->order_by('CourseID', 'desc');
        return $this->db->get('course')->result();
    }
    public function getCourseSiswa()
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('user_course.UserID', $id);
        $this->db->order_by('user_course.JoinDate', 'desc');
        return $this->db->get('course')->result();
    }
    public function getAllCourse()
    //get course where user not joining into that course
    {
        $id = $this->session->userdata('id_user');
        $query = $this->db->query('SELECT *,course.CourseID as id FROM course WHERE course.CourseID NOT IN (SELECT course.CourseID FROM course INNER JOIN user_course ON course.CourseID=user_course.CourseID AND user_course.UserID='.$id.')');
        return $query->result();
    }
    public function course($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'course.CourseID=user_course.CourseID');
        $this->db->where('user_course.UserID', $id);
        $this->db->where('course.CourseID', $CourseID);
        return $this->db->get('course')->row();
    }
    public function courseByGuru($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->where('CourseID', $CourseID);
        return $this->db->get('course')->row();
        
    }
}
                        
/* End of file Course.php */
