<?php

class home_model extends Model {

    public function getMessages() {
        $messages = $this->getList("SELECT * FROM `messages`");

        return $messages;
    }

    public function getLogin(){
    	$user = $this->getList("SELECT * FROM `user`");
    	return $user;
    }
}