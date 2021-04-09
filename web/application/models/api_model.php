<?php
class api_model extends Model {

	public function getLogin($username, $password){    	
        $query = "SELECT id FROM user WHERE username = :username AND password = :password";
        $query_params = array( 
        ':username' => $username,
        ':password' => $password
        ); 
        try
        {
            $result = $this->getField($query, $query_params);
        }
        catch(PDOException $ex) 
        { 
            die("Sikertelen belépés " . $ex->getMessage()); 
        } 
        if(empty($result))
        {
            die("Sikertelen belépés! Nincs ilyen felhasználó!");
        }
        $_SESSION['id'] = $result;
        $_SESSION['username'] = $username;
        var_dump($_SESSION['id']);
        die("Sikeres belépés!"); 
        
    }

    public function postRegister($username, $email, $password){
        $query =
        "INSERT INTO user (username, email, password, registerdate, statusid) VALUES(:username, :email, :password, NOW(), 1)";
        $query_params = array( 
        ':username' => $username,
        ':email' => $email, 
        ':password' => $password
        );         
        try
        {
            $result = $this->executeDML($query, $query_params);
        }
        catch(PDOException $ex) 
        { 
            die("Sikertelen regisztráció: " . $ex->getMessage()); 
        } 
        die("Sikeres Regisztráció"); 


    }

    public function sendMessages($userid, $text){
    	if($text == null){
    		echo "Üres a szöveges rész!";
    	}
    	else{
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
            die("Üzenet elküldve!"); 
    	}
    }

    public function statusChange($userid, $statusid){
        if($statusid < 1 || $statusid > 4){
            die("Nincs ilyen státusz id!");
        }
        else{
            $query = "UPDATE `user` SET `statusid` = :statusid WHERE `id` = :userid";
            $query_params = array( 
            ':statusid' => $statusid,
            ':userid' => $_SESSION['id']
            );  
            try
            {
                $result = $this->executeDML($query, $query_params);
            }
            catch(PDOException $ex) 
            { 
                die("Státusz átállítás sikertelen: " . $ex->getMessage()); 
            } 
            die("Státusz átállítás sikeres!"); 
        }
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
}