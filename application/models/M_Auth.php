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

    public function email_check($email)
    {
        $this->db->select('count(*) as c');
        $this->db->where('UserEmail', $email);
        $row = $this->db->get('users')->row();
        if ($row->c==0) {
            return false;
        }else {
            return true;
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
        $count = $this->db->count_all_results();
        print_r($row);die;
        if ($count==0) {
            return "no";
        }else {
            return $row->UserPassword;

        }
    }   
}
