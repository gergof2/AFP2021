<?php

class Home extends Controller {

    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = $this->load_model('home_model');
    }

    # http://localhost/
    public function index()
    {

        $data['messages'] = ['asd'];

        $this->load_view('home/index', $data);
    }
    public function login(){
        $this->load_view('home/login');
    }
}