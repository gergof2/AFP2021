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
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $result =  $this->model->getLogin($_POST['username'], $_POST['password']);
            if (isset($result['username'])) {
                $_SESSION['username'] = $result['username'];
                $_SESSION['id'] = $result['id'];
                $this->redirect('/message');
            } else {
                $_SESSION['message'] = 'Sikertelen bejelentkezés!';
                $this->redirect('/login');
            }
        }
    }

    public function register(){
             
        if(!empty($_POST['username']) && !empty($_POST['password'] && !empty($_POST['email'])))
        {
            $data = $this->model->postRegister($_POST['username'], $_POST['email'], sha1($_POST['password']));           
            return $this->load_view('home/login',$data);
        }
        
    }

    public function sendmessages(){
        
         if(!empty($_SESSION['username']))
         {
            $this->model->sendMessages($_SESSION['id'], $_POST['message']);
            $data = $this->model->getMessages();      
            return $this->load_view('home/message',$data);
         }
    }
 
#--------------------------Ideas-----------------------------------------------

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

#--------------------------Universal---------------------------------------------

    public function messages(){
        $response = $this->model->getMessages();
        $out = array_values($response);
        echo json_encode($out);       
    }

#---------------------------Cleint Functions-------------------------------------

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

    public function clientRegister(){
        $user = json_decode(file_get_contents('php://input'));    
        $username = $user->{'username'};
        $password = $user->{'password'};
        $email = $user->{'Email'};
        if(!empty($username) && !empty($password) && !empty($email))
        {  
            return $this->model->postClientRegister($username, $email, sha1($password));
        }
        die("Az egyik mező üres!");
    }

    public function clientSendMessage(){
        $message = json_decode(file_get_contents('php://input'));
        $text = $message->{'text'};
        if(!empty($_SESSION['id']) && !empty($text))
        {
            return $this->model->sendClientMessages($_SESSION['id'], $text);
        }
        die("Üres szöveges mező!");
    }

}

