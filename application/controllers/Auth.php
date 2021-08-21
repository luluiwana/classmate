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
        $this->form_validation->set_rules('email', 'email', 'callback_email_check');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'callback_password_check');
        if ($this->form_validation->run() == false) {
            // print_r($this->input->post('email'));die;
            
            $data['title']="Login";
            $this->load->view('home/header', $data);
            $this->load->view('auth/login');
            $this->load->view('home/footer');
        } else {
            print_r("validasi sukses");die;
        }
        // if (password_verify($password, $password_hash)) {
                //         $data = $this->M_Auth->getUserByEmail($email);
                //         $userdata = array(
                //             'id_user'  => $data->UserID,
                //             'nama'     => $data->UserName,
                //             'role'     => $data->UserRole,
                //         );
                //         $this->session->set_userdata($userdata);
                //         if ($data->UserRole=="siswa") {
                //             redirect('siswa', 'refresh');
                //         }
                //         if ($data->UserRole=="guru") {
                //             redirect('guru', 'refresh');
    }
    public function email_check($email)
    {
        $email_cek = $this->M_Auth->email_check($email);
        if ($email_cek==FALSE) {
            $this->form_validation->set_message('email_check', '{field} tidak terdaftar');
            return false;
        }else {
            return true;
        }
    }
    public function password_check($password)
    {
        $email  = $this->input->post('email');
        $hash = $this->M_Auth->password_check($email,$password);
        if (empty($password_check)) {
            return false;
        }else {
            print_r($hash);die;
        }
    }
    public function daftar()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('userRole', 'user role', 'required');
        $this->form_validation->set_rules(
            'telp',
            'Nomor Telepon',
            'required|numeric|min_length[10]|max_length[15]',
            array(
            'numeric'       => '%s harus berupa angka',
            'min_length'    => '%s terlalu pendek',
            'max_length'    => '%s terlalu panjang'
        )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[users.UserEmail]',
            array(
            'valid_email'   => "%s tidak valid",
            'is_unique'     => "%s sudah pernah terdaftar"
        )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[5]',
            array(
            'min_length'    => '%s terlalu pendek'
        )
        );
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi password',
            'required|matches[password]',
            array(
            'matches'   => '%s tidak sesuai'
        )
        );
        
        if ($this->form_validation->run() == false) {
            $data['title'] = "Daftar";
            $this->load->view('home/header', $data);
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
