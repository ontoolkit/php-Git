<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('home');
    }

    public function a()
    {
        $name = $_GET['name'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $password = $_GET['password'];
        $sid = $_GET['uid'];

        $data = array('name' => $name,
            'password' => $password,
            'email' => $email,
            'phone' => $phone,
            'uid' => $sid);

        $val = $this->education->store($data);
        if ($val == 1) {
            $status = "ok";
        } else {
            $status = "failed";
        }

        echo json_encode(array("response" => $status));

    }

    public function b()
    {
        $email = $_GET['email'];
        $password = $_GET['password'];

        $val = $this->education->logcheck($email);
        $pass = $val[0]['password'];
        if ($password == $pass) {
            $id = $val[0]['id'];
            $name = $val[0]['name'];
            $status = "ok";
            echo json_encode(array('response'=>$status, 'id'=>$id, 'name' => $name));
        } else {
            $status = "failed";
            echo json_encode(array('response'=>$status));
        }
    }
}