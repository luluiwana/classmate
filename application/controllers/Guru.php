<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != "guru") {
            redirect('auth', 'refresh');
        }
        $this->load->model('Course_model');
        $this->load->model('M_Quiz');
    }

    public function index()
    {
        $data = array(
            'title'         => "Dashboard",
            'menu'          => "Dashboard",
            'courseList'    => $this->Course_model->getCourseGuru_limit(),
            'countCourse'   => $this->Course_model->countCourseGuru(),
            'countSiswa'    => $this->Course_model->countSiswa(),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/dashboard');
        $this->load->view('guru/template/footer');
    }
    public function kelas()
    {
        $data = array(
            'title'         => "Kelas",
            'menu'          => "Kelas",
            'courseList'    => $this->Course_model->getCourseGuru()
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/kelas');
        $this->load->view('guru/template/footer');
    }
    public function buatkelas()
    {
        $data = array(
            'title'         => "Buat Kelas",
            'menu'          => "Kelas",
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/buat_kelas');
        $this->load->view('guru/template/footer');
    }
    public function addkelas()
    {
        $config['upload_path']          = './media/logo';
        $config['allowed_types']        = 'jpg|png|jpeg';;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('CourseLogo')) {
            echo $this->upload->display_errors();
            redirect('guru/buatkelas', 'refresh');
        } else {
            $data = array(
                'CourseName'    => $this->input->post('CourseName'),
                'ClassName'     => $this->input->post('ClassName'),
                'SchoolName'    => $this->input->post('SchoolName'),
                'TeacherID'    => $this->session->userdata('id_user'),
                'CourseLogo' => $this->upload->data('file_name'),
            );
            $this->db->insert('course', $data);
        }
        redirect('guru', 'refresh');
    }
    public function editkelas($CourseID)
    {
        $config['upload_path']          = './media/logo';
        $config['allowed_types']        = 'jpg|png|jpeg';;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('CourseLogo')) {
            $data = array(
                'CourseName'    => $this->input->post('CourseName'),
                'ClassName'     => $this->input->post('ClassName'),
                'SchoolName'    => $this->input->post('SchoolName'),
                'TeacherID'    => $this->session->userdata('id_user'),
            );
            $this->Course_model->updateKelas($CourseID, $data);
        } else {
            $data = array(
                'CourseName'    => $this->input->post('CourseName'),
                'ClassName'     => $this->input->post('ClassName'),
                'SchoolName'    => $this->input->post('SchoolName'),
                'TeacherID'    => $this->session->userdata('id_user'),
                'CourseLogo' => $this->upload->data('file_name'),
            );
            $old_logo = $this->Course_model->getOldLogo($CourseID);
            $this->Course_model->updateKelas($CourseID, $data);
            unlink('./media/logo/' . $old_logo); // This is an absolute path to the file

        }
        redirect('guru/pengaturan/' . $CourseID, 'refresh');
    }
    public function hapuskelas($CourseID)
    {
        $old_logo = $this->Course_model->getOldLogo($CourseID);
        unlink('./media/logo/' . $old_logo); // This is an absolute path to the file
        $this->Course_model->deleteCourse($CourseID);

        redirect('guru/kelas', 'refresh');
    }
    public function kick($CourseID, $UserID)
    {
        $this->Course_model->kick($CourseID, $UserID);

        redirect('guru/siswa/' . $CourseID, 'refresh');
    }
    public function course($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Kelas",
            // 'competencies' => $this->Course_model->getCompetenciesByID($CourseID),
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'id' => $CourseID
            // 'lesson' => $this->Course_model->getAllCourse()
        );

        $data['competencies'] =  $this->Course_model->getCompetenciesByIDwithArray($CourseID);
        foreach ($data['competencies'] as $row) {
            $lesson_result = $this->Course_model->getLessonByCompetenciesID($row['CompetenciesID']);
            if ($lesson_result) {
                $data['lesson'][$row['CompetenciesID']] = $lesson_result;
            }
        }
        foreach ($data['competencies'] as $row) {
            $quiz_result = $this->Course_model->getQuizByCompetenciesID($row['CompetenciesID']);
            if ($quiz_result) {
                $data['quiz'][$row['CompetenciesID']] = $quiz_result;
            }
        }


        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/course');
        $this->load->view('guru/template/footer');
    }

    public function addKD($CourseID)
    {
        $insert_data = [
            'CourseID' => $CourseID,
            'CompetenciesName' => $this->input->post('nama-kd'),
            'CourseID' => $CourseID,
        ];
        $this->Course_model->addCompetencies($insert_data);
        redirect('guru/course/' . $CourseID);
    }

    public function Lesson($CompetenciesID)
    {
        $data = array(
            'title'     => 'Tambah Materi',
            'menu'      => 'Add Lesson',
            'CompetenciesID' => $CompetenciesID
        );

        $this->load->view('guru/template/header', $data);
        // $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/add_materi');
        $this->load->view('guru/template/footer');
    }

    public function detail_lesson($LessonID)
    {
        $data = array(
            'title'     => 'Lihat Materi',
            'menu'      => 'Add Lesson',
        );


        $content['lesson'] = $this->Course_model->getLessonContentByID($LessonID);
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/course/lihat_materi', $content);
        $this->load->view('guru/template/footer');
    }



    public function addLessonCourse($CompetenciesID)
    {
        $config['upload_path']          = './assets/lesson/';
        $config['allowed_types']        = '*';

        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $this->session->userdata('id_user') . '_' . round(microtime(true)) . '.' . $temp[1];
        $config['file_name']            = $newfilename;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            //jika user tidak upload file
            $insert_data = array(
                'CompetenciesID' => $CompetenciesID,
                'LessonContent' => $this->input->post('content'),
                'LessonTitle' => $this->input->post('judul'),
                'File' => $newfilename,
                'LessonTitle' => $this->input->post('title')
            );
            $this->Course_model->addLesson($insert_data);
            redirect('guru/Lesson/' . $CompetenciesID);
        } else {

            $insert_data = array(
                'CompetenciesID' => $CompetenciesID,
                'LessonContent' => $this->input->post('content'),
                'LessonTitle' => $this->input->post('judul'),
                'File' => $newfilename,
                'LessonTitle' => $this->input->post('title')
            );
            $this->Course_model->addLesson($insert_data);
            redirect('guru/Lesson/' . $CompetenciesID);
        }
    }

    public function aktivitas($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Aktivitas",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/aktivitas');
        $this->load->view('guru/template/footer');
    }
    public function rekap($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Rekap Nilai",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/rekap_nilai');
        $this->load->view('guru/template/footer');
    }
    public function siswa($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Kelas',
            'course_menu' => "Daftar Siswa",
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'siswa'     => $this->Course_model->getSiswaByCourse($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');
        $this->load->view('guru/course/daftar_siswa');
        $this->load->view('guru/template/footer');
    }
    public function pengaturan($CourseID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Pengaturan',
            'course_menu' => "Pengaturan",
            'course'    => $this->Course_model->courseByGuru($CourseID),
        );
        $this->load->view('guru/template/header', $data);
        $this->load->view('guru/template/course_menu');

        $this->load->view('guru/course/pengaturan');
        $this->load->view('guru/template/footer');
    }

    public function create_quiz($CourseID, $CompetenciesID)
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(
                'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
                'menu'      => 'Tambah Quiz',
                'course_menu' => "Tambah Quiz",
                'course'    => $this->Course_model->courseByGuru($CourseID),
                'id' => $CompetenciesID,
                'courseID' => $CourseID
            );

            $this->load->view('guru/template/header', $data);

            $this->load->view('guru/course/create_quiz');
            $this->load->view('guru/template/footer');
        } else {
            $insert_data = [
                'CompetenciesID' => $CompetenciesID,
                'QuizTitle' => $this->input->post('judul'),

            ];

            $QuizID =   $this->M_Quiz->createQuiz($insert_data);
            redirect('guru/create_question/' . $CourseID . '/' . $QuizID);
        }
    }

    public function create_question($CourseID, $QuizID)
    {
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(

                'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
                'menu'      => 'Tambah Quiz',
                'course_menu' => "Tambah Quiz",
                'course'    => $this->Course_model->courseByGuru($CourseID),
                'id' => $QuizID,
                'nomor_soal' => $this->M_Quiz->getQuizCount($QuizID),
                'courseID' => $CourseID,
            );

            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/course/create_question');
            $this->load->view('guru/template/footer');
        } else {
            $choose_option = $this->input->post('processed');
            if ($choose_option == 'Tambah Soal') {
                $temp = explode(".", $_FILES["file"]["name"]);
                $newfilename = round(microtime(true)) . '.' . $temp[1];

                $config['file_name']            = $newfilename;

                $config['upload_path']          = "media/soal/";
                $config['allowed_types']          = '*';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {

                    $insert_data = array(
                        'QuizID' => $QuizID,
                        'Question' => $this->input->post('soal'),
                        'OptionA' => $this->input->post('jawaban_1'),
                        'OptionB' => $this->input->post('jawaban_2'),
                        'OptionC' => $this->input->post('jawaban_3'),
                        'OptionD' => $this->input->post('jawaban_4'),
                        'TrueOption' => $this->input->post('TrueOption'),
                    );
                    $this->M_Quiz->saveQuestion($insert_data, $QuizID);
                    redirect('guru/create_question/' . $CourseID . '/' . $QuizID);
                } else {
                    $insert_data = array(
                        'QuizID' => $QuizID,
                        'Question' => $this->input->post('soal'),
                        'OptionA' => $this->input->post('jawaban_1'),
                        'OptionB' => $this->input->post('jawaban_2'),
                        'OptionC' => $this->input->post('jawaban_3'),
                        'OptionD' => $this->input->post('jawaban_4'),
                        'TrueOption' => $this->input->post('TrueOption'),

                        'question_img' => $config['file_name'],
                    );
                    $this->M_Quiz->saveQuestion($insert_data, $QuizID);
                    redirect('guru/create_question/' . $CourseID . '/' . $QuizID);
                }
            } elseif ($choose_option == 'Simpan') {
                $temp = explode(".", $_FILES["file"]["name"]);
                $newfilename = round(microtime(true)) . '.' . $temp[1];

                $config['file_name']            = $newfilename;

                $config['upload_path']          = "media/soal/";
                $config['allowed_types']          = '*';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {
                    $insert_data = array(
                        'QuizID' => $QuizID,
                        'Question' => $this->input->post('soal'),
                        'OptionA' => $this->input->post('jawaban_1'),
                        'OptionB' => $this->input->post('jawaban_2'),
                        'OptionC' => $this->input->post('jawaban_3'),
                        'OptionD' => $this->input->post('jawaban_4'),
                        'TrueOption' => $this->input->post('TrueOption'),
                    );
                    $this->M_Quiz->saveQuestion($insert_data, $QuizID);
                    redirect('guru/list_question/' . $CourseID . '/' . $QuizID);
                } else {
                    $insert_data = array(
                        'QuizID' => $QuizID,
                        'Question' => $this->input->post('soal'),
                        'OptionA' => $this->input->post('jawaban_1'),
                        'OptionB' => $this->input->post('jawaban_2'),
                        'OptionC' => $this->input->post('jawaban_3'),
                        'OptionD' => $this->input->post('jawaban_4'),
                        'TrueOption' => $this->input->post('TrueOption'),

                        'question_img' => $config['file_name'],
                    );
                    $this->M_Quiz->saveQuestion($insert_data, $QuizID);
                    redirect('guru/list_question/' . $CourseID . '/' . $QuizID);
                }
            }
        }
    }



    public function list_question($CourseID, $QuizID)
    {
        $data = array(
            'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
            'menu'      => 'Daftar Pertanyaan',
            'course_menu' => "Daftar Pertanyaan",
            'course'    => $this->Course_model->courseByGuru($CourseID),
            'id' => $QuizID,
            'courseID' => $CourseID,
        );

        $data['question'] = $this->M_Quiz->getListQuestionByQuizID($QuizID);
        $this->load->view('guru/template/header', $data);

        $this->load->view('guru/course/list_question');
        $this->load->view('guru/template/footer');
    }

    public function edit_question($CourseID, $QuestionID)
    {
        $this->form_validation->set_rules('soal', 'Soal', 'required');
        if ($this->form_validation->run() == false) {
            $data = array(

                'title'     => $this->Course_model->courseByGuru($CourseID)->CourseName . " - " . $this->Course_model->courseByGuru($CourseID)->ClassName,
                'menu'      => 'Tambah Quiz',
                'course_menu' => "Tambah Quiz",
                'course'    => $this->Course_model->courseByGuru($CourseID),
                'id' => $QuestionID,
                'courseID' => $CourseID
                // 'nomor_soal' => $this->M_Quiz->getQuizCount($QuestionID)
            );
            $data['result'] = $this->M_Quiz->getDetailQuestion($QuestionID);
            $this->load->view('guru/template/header', $data);
            $this->load->view('guru/course/edit_question');
            $this->load->view('guru/template/footer');
        } else {
            $temp = explode(".", $_FILES["file"]["name"]);
            $newfilename = round(microtime(true)) . '.' . $temp[1];

            $config['upload_path']          = "media/soal/";
            $config['allowed_types']          = '*';


            $config['file_name']            = $newfilename;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {

                // $error = array('error' => $this->upload->display_errors());

                // return $error;

                $raw = $this->M_Quiz->getQuizCount($this->input->post('quizid'));
                $jumlah = $raw->jumlah;
                (float)$total = 100 / $jumlah . (float)$jumlah;

                $insert_data = array(

                    'Question' => $this->input->post('soal'),
                    'OptionA' => $this->input->post('jawaban_1'),
                    'OptionB' => $this->input->post('jawaban_2'),
                    'OptionC' => $this->input->post('jawaban_3'),
                    'OptionD' => $this->input->post('jawaban_4'),
                    'TrueOption' => $this->input->post('TrueOption'),
                    'Score' => $total
                );
                $this->M_Quiz->EditQuestion($insert_data, $QuestionID);
                redirect('guru/list_question/' . $CourseID . '/' . $this->input->post('quizid'));
            } else {
                $raw = $this->M_Quiz->getQuizCount($this->input->post('quizid'));
                $jumlah = $raw->jumlah;
                (float)$total = 100 / $jumlah . (float)$jumlah;
                $insert_data = array(

                    'Question' => $this->input->post('soal'),
                    'OptionA' => $this->input->post('jawaban_1'),
                    'OptionB' => $this->input->post('jawaban_2'),
                    'OptionC' => $this->input->post('jawaban_3'),
                    'OptionD' => $this->input->post('jawaban_4'),
                    'TrueOption' => $this->input->post('TrueOption'),
                    'question_img' => $config['file_name'],
                    'Score' => $total,
                );

                $this->M_Quiz->EditQuestion($insert_data, $QuestionID);
                redirect('guru/list_question/' . $CourseID . '/' . $this->input->post('quizid'));
            }
        }
    }

    public function hapus_soal($QuizID, $QuestionID)
    {
        $this->db->delete('quiz_question', array('QuestionID' => $QuestionID));
        redirect('guru/list_question/' . $QuizID);
    }
}
        
    /* End of file  guru.php */
