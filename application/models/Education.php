<?php
class Education extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store($data)
    {
        $val = $this->db->insert('users', $data);
        return $val;
    }
    public function logcheck($email)
    {
        $sql = "select * from users where email='$email' or uid='$email'";
        $val = $this->db->query($sql);
        return $val->result_array();
    }
}