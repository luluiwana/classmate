<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Auth');
    }

    public function index()
    {
        if ($this->session->has_userdata('id_user')) {
            $userdata = array('id_user', 'nama');
            $this->session->unset_userdata($userdata);
            $this->session->sess_destroy();
            redirect('auth', 'refresh');
        } else {
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'Kata Sandi', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view('home/header');
                $this->load->view('auth/login');
                $this->load->view('home/footer');
            } else {
                $password =  $this->input->post('password');
                $email = $this->input->post('email');
                $cek_email = $this->M_Auth->emailCheck($email);
                if ($cek_email == true) {
                    $password_hash = $this->M_Auth->password_check($email);
                    if (password_verify($password, $password_hash)) {
                        $data = $this->M_Auth->getUserByEmail($email);
                        $userdata = array(
                            'id_user'  => $data->UserID,
                            'nama'     => $data->UserName,
                            'role'     => $data->UserRole,
                        );
                        $this->session->set_userdata($userdata);
                        if ($data->UserRole=="siswa") {
                            redirect('siswa', 'refresh');
                        }
                        if ($data->UserRole=="guru") {
                            redirect('guru', 'refresh');
                        }
                    } else {
                        echo 'password ga cocok';
                    }
                } else {
                    echo 'email ga cocok';
                }
            }
        }
    }
    public function daftar()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('home/header');
            $this->load->view('auth/daftar');
            $this->load->view('home/footer');
        } else {
            $insert_data = [
                'UserName' => $this->input->post('nama'),
                'UserEmail' => $this->input->post('email'),
                'UserPassword' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'UserContactNo' => $this->input->post('telp'),
                'UserRole' => $this->input->post('userRole'),
            ];
            $this->M_Auth->do_register($insert_data);
            
            redirect('auth', 'refresh');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        
        redirect('auth', 'refresh');
    }
}
