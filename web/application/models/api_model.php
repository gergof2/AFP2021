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
            echo "Sikertelen Regisztráció: ".$result;
        }else{
            echo "Sikeres Regisztráció";
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
            echo"Üzenet elküldése sikertelen: ".$result; 
        }else echo("Üzenet elküldve!"); 
    }

#--------------------------Ideas-----------------------------------------------    

    public function statusChange($userid, $statusid){
        
    }

    public function deleteMessage($id){
        $query = "SELECT `id` FROM messages WHERE `id` = '" . $id . "'";
        $res = $this->getList($query);
        if($res == null)
        {
            echo "Nincs üzenet az adott id-n";
        }
        else{
            $query2 = "DELETE FROM `messages` WHERE `id` = '" . $id . "'";
            $result = $this->executeDML($query2);
            if(!$result){
                echo "Üzenet törlése sikeres volt!";
            }
            else{
                echo "Üzenet törlése sikertelen!";
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
            die("Nincs üzenet!");
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
            die("Sikertelen belépés " . $ex->getMessage()); 
        } 
        if(empty($result))
        {
            die("Sikertelen belépés! Nincs ilyen felhasználó!");
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
            echo "Sikeres regisztráció!";
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
            die("Üzenet elküldése sikertelen: " . $ex->getMessage()); 
        }
        echo("Üzenet elküldve!"); 
    }

}