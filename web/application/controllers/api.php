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
}

