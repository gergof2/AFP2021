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
        $this->load_view('home/index');
    }

    # http://localhost/api/delete GET
    public function deletemessage()
    {
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
                $_SESSION['message'] = 'Login failed!';
                $this->redirect('/login');
            }
        }
    }

    public function register(){
             
        if(!empty($_POST['username']) && !empty($_POST['password'] && !empty($_POST['email'])))
        {
            $result = $this->model->postRegister($_POST['username'], $_POST['email'], sha1($_POST['password']));
            if ($result == null) {
                $_SESSION['message'] = null;
                $this->redirect('/login');
            }else
            $_SESSION['registration'] = $result;
            $this->redirect('/registration');
        }
        
    }

    public function sendmessages(){
        
         if(!empty($_SESSION['username']))
         {
            $this->model->sendMessages($_SESSION['id'], $_POST['message']);
            $this->redirect('/message');
         }
    }


    public function statuschange(){
        if($_POST['statusid'] < 1 || $_POST['statusid'] > 4){
            echo("There is no status id!");
        }
        else $this->model->statusChange($_SESSION['id'], $_POST['statusid']);
    }

    public function getusers(){
        $response = $this->model->getUsers();
        $out = array_values($response);
        echo json_encode($out);    
    }
 
#--------------------------Ideas-----------------------------------------------

    public function sendfile(){

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
        die("One of the fields is empty!");
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
        die("One of the fields is empty!");
    }

    public function clientSendMessage(){
        $json = json_decode(file_get_contents('php://input'));
        $text = $json->{'text'};
         $_SESSION['id'] = $json->{'userid'};
        if(!empty($_SESSION['id']) && !empty($text))
        {
            return $this->model->sendClientMessages($_SESSION['id'], $text);
        }
        die("Empty text field!");
    }

    public function clientStatusChange(){
        $json = json_decode(file_get_contents('php://input'));
        $status = $json->{'statusId'};
        $_SESSION['id'] = $json->{'sessionId'};
        if(!empty($_SESSION['id']) && !empty($status) && $status >= 1 && $status <= 4)
        {
            return $this->model->sendClientStatusChange($_SESSION['id'], $status);
        }
        echo "Problem";
    }

    public function clientGetUsers(){
        $response = $this->model->ClientGetUsers();
        $out = array_values($response);
        echo json_encode($out);
    }

}

