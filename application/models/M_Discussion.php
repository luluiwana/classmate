<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Discussion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addDiscussion($data)
    {
        $this->db->insert($data);
    }
}
