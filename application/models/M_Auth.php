<?php
class M_Auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Auth');
    }

    public function do_register($data)
    {
        $this->db->insert('users', $data);
    }

    public function emailCheck($email)
    {
        $this->db->select('count(*) as c');
        $this->db->where('UserEmail', $email);
        $row = $this->db->get('users')->row();
        if ($row->c == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getUserByEmail($email)
    {
        $this->db->where('UserEmail', $email);
        return $this->db->get('users')->row();
    }
    public function password_check($email)
    {
        $this->db->where('UserEmail', $email);
        $row = $this->db->get('users')->row();
        return $row->UserPassword;
    }
}
