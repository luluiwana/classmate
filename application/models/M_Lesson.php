<?php

defined('BASEPATH') or exit('No direct script access allowed');
                        
class M_Lesson extends CI_Model
{
    public function getCompetency($CourseID)
    {
        // SELECT * FROM `competencies` INNER JOIN user_course ON user_course.CourseID=competencies.CourseID WHERE competencies.CourseID=1 AND user_course.UserID=1
        $id = $this->session->userdata('id_user');
        $this->db->join('user_course', 'competencies.CourseID=user_course.CourseID');
        $this->db->where('competencies.CourseID', $CourseID);
        $this->db->where('user_course.UserID', $id);
        $this->db->order_by('competencies.CompetenciesID', 'asc');
        return $this->db->get('competencies')->result();
    }
    public function getLessons($CompetencyID)
    {
        // SELECT * FROM `course_lesson` WHERE CompetenciesID=1
        $this->db->where('CompetenciesID', $CompetencyID);
        $this->db->join('user_lesson', 'course_lesson.LessonID=user_lesson.LessonID', 'left');
        return $this->db->get('course_lesson')->result();
    }
    public function getLesson($LessonID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*, competencies.CourseID as ID_Course');
        $this->db->join('competencies', 'competencies.CompetenciesID=course_lesson.CompetenciesID ');
        $this->db->join('user_course', 'user_course.CourseID=competencies.CourseID');
        $this->db->where('user_course.UserID', $id);
        $this->db->where('course_lesson.LessonID', $LessonID);
        return $this->db->get('course_lesson')->row();
    }
}
                        
/* End of file lesson.php */
