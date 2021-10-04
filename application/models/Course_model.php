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
        return $this->db->count_all_results();;
    }
    public function getUser()
    {
        // SELECT * FROM `users` INNER JOIN Level ON Level.LevelID=users.Level WHERE users.UserID=3
        $id = $this->session->userdata('id_user');
        $this->db->join('Level', 'Level.LevelID=users.Level');
        $this->db->where('users.UserID', $id);
        return $this->db->get('users')->row();
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
    public function countSiswaByCourse($CourseID)
    {
        $this->db->select('count(*) as c');
        $this->db->join('course', 'user_course.CourseID=course.CourseID');
        $this->db->join('users', 'users.UserID=user_course.UserID');
        $this->db->where('course.CourseID', $CourseID);
        $row = $this->db->get('user_course')->row();
        return $row->c;
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
        $query = $this->db->query('SELECT *,course.CourseID as id FROM course WHERE course.CourseID NOT IN (SELECT course.CourseID FROM course INNER JOIN user_course ON course.CourseID=user_course.CourseID AND user_course.UserID=' . $id . ')');
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
    public function courseInfo($CourseID)
    {
        $this->db->join('users', 'users.UserID=course.TeacherID');
        $this->db->where('CourseID', $CourseID);
        return $this->db->get('course')->row();
    }
    public function courseByGuru($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->where('CourseID', $CourseID);
        return $this->db->get('course')->row();
    }
    public function getSiswaByCourse($CourseID)
    {
        $id = $this->session->userdata('id_user');

        $this->db->join('course', 'user_course.CourseID=course.CourseID');
        $this->db->join('users', 'users.UserID=user_course.UserID');
        $this->db->where('course.CourseID', $CourseID);
        $this->db->where('course.TeacherID', $id);

        $this->db->order_by('users.UserName', 'asc');

        return $this->db->get('user_course')->result();
    }
    public function updateKelas($CourseID, $data)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('CourseID', $CourseID);
        $this->db->where('TeacherID', $id);
        $this->db->update('course', $data);
    }
    public function getOldLogo($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->where('CourseID', $CourseID);
        $row = $this->db->get('course')->row();
        return $row->CourseLogo;
    }
    public function deleteCourse($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('TeacherID', $id);
        $this->db->where('CourseID', $CourseID);
        $this->db->delete('course');
    }
    public function kick($CourseID, $UserID)
    {
        $this->db->where('UserID', $UserID);
        $this->db->where('CourseID', $CourseID);
        $this->db->delete('user_course');
    }
    public function teman($CourseID)
    {
        $this->db->join('course', 'user_course.CourseID=course.CourseID');
        $this->db->join('users', 'users.UserID=user_course.UserID');
        $this->db->where('course.CourseID', $CourseID);
        $this->db->order_by('users.UserName', 'asc');
        return $this->db->get('user_course')->result();
    }
    public function quit($CourseID)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('CourseID', $CourseID);
        $this->db->where('UserID', $id);
        $this->db->delete('user_course');
    }
    public function deleteUserLesson($CourseID)
    {
        // SELECT * FROM `user_lesson` INNER JOIN course_lesson ON course_lesson.LessonID=user_lesson.LessonID INNER JOIN competencies ON competencies.CompetenciesID=course_lesson.CompetenciesID WHERE user_lesson.UserID=3 AND competencies.CourseID=1
        $id = $this->session->userdata('id_user');
        $this->db->where('CourseID', $CourseID);
        $this->db->where('UserID', $id);
        $this->db->delete('user_lesson');
    }

    public function getCompetenciesByID($CourseID)
    {
        return $this->db->get_where('competencies', array('CourseID' => $CourseID))->result_object();
    }
    public function getCompetenciesByIDwithArray($CourseID)
    {
        return $this->db->get_where('competencies', array('CourseID' => $CourseID))->result_array();
    }

    public function getCouseByCompetenciesID($CompetenciesID)
    {
        return $this->db->get_where('competencies', array('CompetenciesID' => $CompetenciesID))->row_object();
    }

    public function addCompetencies($data)
    {
        $this->db->insert('competencies', $data);
    }

    public function addLesson($data)
    {
        $this->db->insert('course_lesson', $data);
    }

    public function getLessonContentByID($LessonID)
    {
        return $this->db->get_where('course_lesson', array('LessonID' => $LessonID))->row_array();
    }

    public function getLessonByCompetenciesID($CompetenciesID)
    {
        return $this->db->get_where('course_lesson', array('CompetenciesID' => $CompetenciesID))->result_array();
    }

    public function getQuizByCompetenciesID($CompetenciesID)
    {
        return $this->db->get_where('quiz', array('CompetenciesID' => $CompetenciesID))->result_array();
    }

    public function editLesson($data, $id)
    {

        $this->db->where('LessonID', $id);
        $this->db->update('course_lesson', $data);
    }

    public function totalXP()
    {
        // SELECT SUM(courseXP) FROM `user_course`WHERE UserID=1
        $id = $this->session->userdata('id_user');
        $this->db->select('SUM(courseXP) as xp');
        $this->db->where('UserID', $id);
        $row = $this->db->get('user_course')->row();
        return $row->xp;
    }
    public function setLevel($XP)
    {
        $id = $this->session->userdata('id_user');
        if ($XP < 500) {
            $level = 0;
        } elseif ($XP < 1000) {
            $level = 1;
        } elseif ($XP < 2000) {
            $level = 2;
        } elseif ($XP < 4000) {
            $level = 3;
        } elseif ($XP < 8000) {
            $level = 4;
        } else {
            $level = 5;
        }
        $data = array(
            'level' => $level
        );
        $this->db->where('UserID', $id);
        $this->db->update('users', $data);
    }
}
                        
/* End of file Course.php */
