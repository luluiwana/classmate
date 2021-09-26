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
        // SELECT * FROM `course_lesson` WHERE CompetenciesID=1\
        $id = $this->session->userdata('id_user');
        // $this->db->select('*, course_lesson.LessonID as IDLesson');
        $this->db->where('CompetenciesID', $CompetencyID);
        // $this->db->where('UserID', $id);
        // $this->db->join('user_lesson', 'course_lesson.LessonID=user_lesson.LessonID', 'left');
        return $this->db->get('course_lesson')->result();
    }
    
    public function isLessonComplete($LessonID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('UserID', $id);
        $this->db->where('LessonID', $LessonID);
        $row = $this->db->get('user_lesson')->row();
        if (!empty($row)) {
            return true;
        }else {
            return false;
        }
        
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
    public function check_user_lesson($lesson)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('UserID', $id);
        $this->db->where('LessonID', $lesson);
        $query = $this->db->get('user_lesson');
        return $query->num_rows();
    }
    public function complete($data, $CourseID)
    {
        //user complete lesson
        $this->db->insert('user_lesson', $data);

        //add XP value
        $id = $this->session->userdata('id_user');
        $XP = $data['Score'];
        $this->db->set('courseXP', 'courseXP+'.$XP, false);
        $this->db->where('CourseID', $CourseID);
        $this->db->where('UserID', $id);
        $this->db->update('user_course');
    }
    public function scoreByCourse($CourseID)
    {
        // SELECT courseXP FROM `user_course` WHERE UserID=1 AND CourseID=1
        $id = $this->session->userdata('id_user');
        $this->db->where('UserId', $id);
        $this->db->where('CourseID', $CourseID);
        $row = $this->db->get('user_course')->row();
        return $row->courseXP;
    }
}
                        
/* End of file lesson.php */
