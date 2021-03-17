<?php

class Api extends Controller {

    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = $this->load_model('api_model');
    }

    # http://localhost/api GET
    public function index()
    {
        $data['messages'] = ['asd'];

        $this->load_view('home/index', $data);
    }

    # http://localhost/api/delete GET
    public function delete()
    {
        $id = $_GET['id'];
        $delete = $this->model->deleteMessage($id);
    }

    public function login(){
        $username = $_GET['username'];
        $password = sha1($_GET['password']);
        $this->model->getLogin($username, $password);
    }

    public function register(){
        $username = $_GET['username'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $regist = $this->model->postRegister($username, $email, $password);
    }

    public function sendmessages(){
        $userid = $_GET['statusid'];
        $text = $_GET['text'];
        $sendmessages = $this->model->sendMessages($userid, $text);

    }

    public function sendfile(){

    }

    public function statuschange(){
        $userid = $_GET['userid'];
        $statusid = $_GET['statusid'];
        $status = $this->model->statusChange($userid, $statusid);
    }
}

