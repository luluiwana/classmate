<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{
    public function isCourse()
    {
        // check if user have any course

        $id = $this->session->userdata('id_user');
        $this->db->select('count(*) as c');
        $this->db->where('UserID', $id);
        $row = $this->db->get('user_course')->row();
        if ($row->c > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function isCourseGuru()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('count(*) as c');
        $this->db->where('TeacherID', $id);
        $row = $this->db->get('course')->row();
        if ($row->c > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCourseGuru()
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        return $this->db->get('course')->result();
    }
    public function getCourseSiswa()
    {
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID');
        $this->db->where('user_course.UserID', $id);

        return $this->db->get('course')->result();
    }

    public function getAllCourse()
    {
        // SELECT * FROM `course` left OUTER JOIN user_course ON course.CourseID=user_course.CourseID WHERE user_course.UserID is null OR user_course.UserID!=3 GROUP BY course.CourseID
        $id = $this->session->userdata('id_user');
        $this->db->select('*, course.CourseID as Course');
        $this->db->join('user_course', 'course.CourseID = user_course.CourseID', 'left');
        $this->db->where('user_course.UserID is null OR user_course.UserID!=' . $id);
        $this->db->group_by('course.CourseID');
        return $this->db->get('course')->result();
    }
}
                        
/* End of file Course.php */