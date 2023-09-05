<?php

require_once(ROOT_PATH .'/Models/user.php');

class userController {
    protected $user;
    protected $req;


    public function __construct()
    {
       $this->user = new User();

       $this->req['req_get'] = $_GET;
       $this->req['req_post'] = $_POST;
       
    }

    public function Create_User(){
        $result = $this->user->create_user($this->req['req_post']);
        return $result;
    }

    public function Login(){
        $result = $this->user->login($this->req['req_post']['email'],$this->req['req_post']['password']);
        
        return $result;
    }

    public function Email_Exist(){
        $result = $this->user->email_exist($this->req['req_post']['email']);
        
        return $result;
    }


}


?>