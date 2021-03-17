<?php

class api_model extends Model {

	public function getLogin($username, $password){    	
        $query = "SELECT * FROM `user` WHERE `username` = '" . $username. "'";
        $query2 = "SELECT `password` FROM `user` WHERE `username` = '" . $username. "'";
        if($user = $this->getList($query))
        {
        	if($password == $this->getField($query2))
        	{
        		echo "Sikeres belépés!";
        		var_dump($user);       		
        		return $user;
        	}
        	else
        	{
        		echo "Sikertelen belépés! Rossz jelszó!";
        	}
        }
        else
        {
        	echo "Sikertelen belépés! Rossz felhasználónév!";
        }
    }

    public function postRegister($username, $email, $password){
    	$query = "SELECT `username` FROM user WHERE `username` = '" . $username . "'";
    	$query2 = "SELECT `email` FROM user WHERE `email` = '" . $email . "'";
    	$res1 = $this->getList($query);
    	$res2 = $this->getList($query2);
    	if($res1 > null || empty($username)){
    		echo "A felhasználónév foglalt vagy üres!";
    	}
    	else
    	{
    		if($res2 > null || empty($email)){
    			echo "Az email cím már foglalt vagy üres!";
    		}
            else if($password == null)
            {
                echo "A jelszó nem lehet üres!";
            }
    		else{
    			$query3 = "INSERT INTO user (username, email, password, registerdate, statusid)
    						VALUES ('$username', '$email', '$password', NOW(), '1')";
    			$result = $this->executeDML($query3);
    			if(!$result){
    				echo"Sikeres regisztráció!";
    			}
    			else{
    				echo"Sikertelen regisztráció!";
    			}
    		}
    	}
    }

    public function sendMessages($userid, $text){
    	if($text == null){
    		echo "Üres a szöveges rész!";
    	}
    	else{
    		$query = "INSERT INTO messages (userid, text, timedate) VALUES('$userid', '$text', NOW())";
    		$result = $this->executeDML($query);
    		if(!$result){
    			echo"Üzenet elküldve!";
    		}
    		else{
    			echo"Nem sikerült elküldeni az üzenetet!";
    		}
    	}
    }

}