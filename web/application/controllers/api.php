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
        $this->model = $this->delete();
    }

    public function login($username = "admin", $password = "admin"){
        parent::__construct();
        $this->model =$this->load_model('api_model');
        $user = $this->model->getLogin();
        var_dump($user);
        $this->load_view('home/index', $user);
    }

    public function register(){

    }

    public function sendmessages(){

    }

    public function sendfile(){

    }

    public function statuschange(){
        
    }
}

