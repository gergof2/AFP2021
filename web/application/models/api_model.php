<?php
class api_model extends Model {

	public function getLogin($username, $password) {
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $query_params = array(         
            ':username' => $username,
            ':password' => sha1($password)
        );        
        return $this->getRecord($query, $query_params);       
    }
    
    public function postRegister($username, $email, $password){
        $query =
        "INSERT INTO user (username, email, password, registerdate, statusid) VALUES(:username, :email, :password, NOW(), 1)";
        $query_params = array( 
        ':username' => $username,
        ':email' => $email, 
        ':password' => $password
        );
        $result = $this->executeDML($query, $query_params);
        if (!empty($result)) {
            echo "Registration failed: ".$result;
        }else{
            echo "Successful registration!";
        }  
    }

    public function sendMessages($userid, $text){
    	$query = "INSERT INTO messages (userid, text, timedate) VALUES(:userid, :text, NOW())";
        $query_params = array( 
        ':userid' => $_SESSION['id'],
        ':text' => $text
        );
        $result = $this->executeDML($query, $query_params);
        if (!empty($result)) {
            echo"Failed to send message: ".$result; 
        }else echo("Message sent!"); 
    }

    public function statusChange($userid, $statusid){
        $query = "UPDATE `user` SET `statusid` = :statusid WHERE `id` = :userid";
        $query_params = array( 
        ':statusid' => $statusid,
        ':userid' => $_SESSION['id']
        );
        $result = $this->executeDML($query, $query_params);
        if (!empty($result)) {
        echo"Failed status statement: ".$result; 
        }else echo("Status changed!"); 

    }

#--------------------------Ideas-----------------------------------------------      

    public function deleteMessage($id){
        $query = "SELECT `id` FROM messages WHERE `id` = '" . $id . "'";
        $res = $this->getList($query);
        if($res == null)
        {
            echo "";
        }
        else{
            $query2 = "DELETE FROM `messages` WHERE `id` = '" . $id . "'";
            $result = $this->executeDML($query2);
            if(!$result){
                echo "!";
            }
            else{
                echo "!";
            }
        }

    }

#--------------------------Universal---------------------------------------------

    public function getMessages(){
        //$query = "SELECT * FROM `messages`";
        $query = "SELECT messages.id, username, text, timedate FROM messages INNER JOIN user ON messages.userid = user.id ORDER BY messages.id";
        $result = $this->getList($query);
        if($result == null)
        {
            die("No messages!");
        }
        else {
            return $result;
        }
    }

#---------------------------Cleint Functions-------------------------------------

    public function getClientLogin($username, $password) {
        $query = "SELECT id FROM user WHERE username = :username AND password = :password";
        $query_params = array( 
        ':username' => $username,
        ':password' => $password
        ); 
        try
        {
            $result = $this->getRecord($query, $query_params);
        }
        catch(PDOException $ex) 
        { 
            die("Login failed " . $ex->getMessage()); 
        } 
        if(empty($result))
        {
            die("Login failed! No such user!");
        }
        else{
            $_SESSION['id'] = $result[0];
            echo $_SESSION['id'];
        } 
    }

    public function postClientRegister($username, $email, $password){
        $query =
        "INSERT INTO user (username, email, password, registerdate, statusid) VALUES(:username, :email, :password, NOW(), 1)";
        $query_params = array( 
        ':username' => $username,
        ':email' => $email, 
        ':password' => $password
        );
        $result = $this->executeDML($query, $query_params);
        if($result == null){
            echo "Successful registration!";
        }
        else echo $result;
    }

    public function sendClientMessages($userid, $text){
        $query = "INSERT INTO messages (userid, text, timedate) VALUES(:userid, :text, NOW())";
        $query_params = array( 
        ':userid' => $_SESSION['id'],
        ':text' => $text
        );  
        try
        {
            $result = $this->executeDML($query, $query_params);
        }
        catch(PDOException $ex) 
        { 
            die("Failed to send message: " . $ex->getMessage()); 
        }
        echo("Message sent!"); 
    }

    public function sendClientStatusChange($userid, $statusid){
        
    }

}