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
        if(empty($_POST['username']) || empty($_POST['password']))
        {
            die("Az egyik mező üres!");
        }
        else{
            return $this->model->getLogin($_POST['username'], sha1($_POST['password']));
        }
    }

    public function register(){
         if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']))
        {
            die("Az egyik mező üres!");
        }
        else{
            return $this->model->postRegister($_POST['username'], $_POST['email'], sha1($_POST['password']));
        }
        
    }

    public function sendmessages(){
        if(empty($_SESSION['id']) || empty($_POST['text']))
        {
            die("Az egyik mező üres!");
        }
        else
        {
            return $this->model->sendMessages($_SESSION['id'], $_POST['text']);
        }
    }

    public function sendfile(){

    }

    public function statuschange(){
        if(empty($_SESSION['id']) || empty($_POST['statusid']))
        {
            die("Az egyik mező üres!");
        }
        else
        {
            return $this->model->statusChange($_SESSION['id'], $_POST['statusid']);
        }
    }

    public function messages(){
        return $this->model->getMessages();
    }
}

