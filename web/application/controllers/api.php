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

    public function login()
    {
        $user = json_decode(file_get_contents('php://input'));


        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $result =  $this->model->getLogin($_POST['username'], $_POST['password']);
            if (isset($result['username'])) {
                $_SESSION['username'] = $result['username'];
                $this->redirect('/message');
            } else {
                $_SESSION['message'] = 'Sikertelen bejelentkezés!';
                $this->redirect('/login');
            }
        }
        $username = $user->{'username'};
        $password = $user->{'password'};
        if(!empty($username) && !empty($password))
        {             
            return $this->model->getLogin($username, sha1($password), false);
        }
        
        die("Az egyik mező üres!");
    }

    public function register(){
        $user = json_decode(file_get_contents('php://input'));
             
        if(!empty($_POST['username']) && !empty($_POST['password'] && !empty($_POST['email'])))
        {
            return $this->model->postRegister($_POST['username'], $_POST['email'], sha1($_POST['password']), true);
        }
        die("Az egyik mező üres!");
        
    }

    public function sendmessages(){
        $message = json_decode(file_get_contents('php://input'));
        if(!empty($_SESSION['id']) && !empty($_POST['text']))
        {
             return $this->model->sendMessages($_SESSION['id'], $_POST['text'], true);
        }
        $text = $message->{'text'};
        if(!empty($_SESSION['id']) && !empty($text))
        {
            return $this->model->sendMessages($_SESSION['id'], $text, false);
        }
        die("Üres szöveges mező!");
    }

     public function clientLogin(){
        $user = json_decode(file_get_contents('php://input'));

        $username = $user->{'username'};
        $password = $user->{'password'};
        if(!empty($username) && !empty($password))
        {             
            return $this->model->getClientLogin($username, sha1($password));
        }
        die("Az egyik mező üres!");
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
        $response = $this->model->getMessages();
        $out = array_values($response);
        echo json_encode($out);
        
    }
}

