<?php

require_once(ROOT_PATH .'/Models/Db.php');


class User extends Db {

    public function __construct()
    {
        parent::__construct($dbh = null);
    }


    public function create_user($userData) {

        $result = false;        

        if($_SESSION['role'] === 1) {
            $sql = 'INSERT INTO user (name,age,email,password,role) VALUES (?,?,?,?,?)';

            $arr = [];
            $arr[] = $userData['name'];
            $arr[] = $userData['age'];
            $arr[] = $userData['email'];
            $arr[] = password_hash($userData['password'],PASSWORD_DEFAULT);
            $arr[] = $_SESSION['role'];
        } else {
            $sql = 'INSERT INTO user (name,age,email,password) VALUES (?,?,?,?)';

            $arr = [];
            $arr[] = $userData['name'];
            $arr[] = $userData['age'];
            $arr[] = $userData['email'];
            $arr[] = password_hash($userData['password'],PASSWORD_DEFAULT);
    
        }


        try{
            $stmt = $this->dbh->prepare($sql);
            $touroku = $stmt->execute($arr);
            
            if(!$touroku){
                return $result;
            }
            $result = true;
            return $result;
            
        }catch(\Exception $e){
            return $result;
        }
    }
    //

    public  function login($email,$password) {

        $result = false;
        $sql = 'SELECT * FROM user WHERE email = ?';

        $arr = [];
        $arr[] = $email;

        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($arr);
            $user = $stmt->fetch();
        } catch (PDOException $e) {
            return $result;
        }
    
        if(!$user){
            
            $_SESSION['email_err'] = 'メールアドレスもしくはパスワードが存在しません。';
            return $result;
        }

        if(password_verify($password,$user['password'])) {
            $_SESSION['user_data'] = $user;
            return $result = true;
        }else{
            
            $_SESSION['password_err'] = 'メールアドレスもしくはパスワードが間違っています。';
            return $result;
        }
        

    }

    public  function email_exist($email) {

        $result = false;
        $sql = 'SELECT * FROM user WHERE email = ?';

        $arr = [];
        $arr[] = $email;

        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($arr);
            $user = $stmt->fetch();
            
            
            return $result;
            
        } catch (PDOException $e) {
            return $result;
        }

    }

    
}

?>