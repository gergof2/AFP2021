<?php

class api_model extends Model {

	public function getLogin(){    	
        $query = "SELECT username FROM user WHERE username = :username";
        $user = $this->getList($query);
    	return $user;
    }

}