<?php

class validation {

    public function __construct()
    {
        
    }

    public function signUpCheck(){


        $err = [];

        if(!$name = filter_input(INPUT_POST,'name')){
            $err['name'] = 'ユーザ名を記入して下さい。';
        }

        if(!$age = filter_input(INPUT_POST,'age')){
            $err['age'] = '年齢を選択して下さい';
        }

        if(!$email = filter_input(INPUT_POST,'email')){
            $err['email'] = 'メールアドレスを記入して下さい。';
        }

        if(!$password = filter_input(INPUT_POST,'password')){
            $err['password'] = 'パスワードを記入して下さい';
        }else if (!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)) {
            $err['password'] = 'パスワードは８文字以上１００文字以下にして下さい。';
        }


        $password_conf = filter_input(INPUT_POST,'password_conf');
            if($password_conf !== $password) {
                $err['password_conf'] = '確認用パスワードと異なっています。';
            }

        if(count($err) === 0){
            $_SESSION['name'] = $this->h($name);
            $_SESSION['age'] = $this->h($age);
            $_SESSION['email'] = $this->h($email);
            $_SESSION['password'] = $this->h($password);
            return $err;
        }
        return $err;

    }





    public function loginCheck(){
        
        $err = [];
        
        if(!$email = filter_input(INPUT_POST,'email')){
            $err['email'] = 'メールアドレスを記入して下さい';
        }
        
        if(!$password = filter_input(INPUT_POST,'password')){
            $err['password'] = 'パスワードを記入して下さい';
        }
        
        if(count($err) === 0){
            return $err;
        }
        return $err;

    }




    public function item_register_check($img){


        $err = [];


        if(!$item_name = filter_input(INPUT_POST,'item_name')){
            $err['item_name'] = '商品名を記入して下さい。';
        }
        
        if(!$item_price = filter_input(INPUT_POST,'item_price')){
            $err['item_price'] = '商品の値段を記入して下さい。';
        }

        if(!$item_count = filter_input(INPUT_POST,'item_count')){
            $err['item_count'] = '商品数を記入して下さい。';
        }
        
        if(!$img){
            $err['img'] = '商品画像を選んでください。';
        }

        if(count($err) === 0){
            $_SESSION['item_name'] = $this->h($item_name);
            $_SESSION['item_price'] = $this->h($item_price);
            $_SESSION['item_count'] = $this->h($item_count);
            $_SESSION['img'] = $img;
            return $err;
        }
        return $err;
    } 


    // htmlspecialchars対策
    function h($str) {
        return htmlspecialchars($str, ENT_QUOTES|ENT_HTML5, "UTF-8");
    }

}
?>