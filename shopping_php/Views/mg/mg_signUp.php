<?php
session_cache_limiter('none');
session_start();
require_once(ROOT_PATH.'Controllers/userController.php');
require_once(ROOT_PATH.'Controllers/validation.php');



$userController = new userController();
$validation = new validation();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $err = $validation->signUpCheck();
    $userController->Email_Exist();


        if(empty($err)){
            header('location:mg_signUp_conf.php');
            exit;
        }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user_style.css">
    <title>MG新規登録</title>
</head>
<body>
<div class="signup">
    <h2 class="signup_header">MG新規登録</h2>
    <form action="#" method="POST">
        <div class="data">
            <p>
                <?php if(isset($err['name']))echo "<p>".$err['name']."</p>"?>
                <label for="name">ユーザ名</label>
                <input type="text" name="name">
            </p>
            <p>
            <?php if(isset($err['age']))echo "<p>".$err['age']."</p>"?>
            <select name="age">
                <?php for($i = 15; $i <= 100; $i++):?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php endfor;?>
                </select>歳
            </p>


            <p>
                <?php if(isset($err['email']))echo "<p>".$err['email']."</p>"?>
                <label for="name">メールアドレス</label>
                <input type="email" name="email">
            </p>
            <p>
                <?php if(isset($err['password']))echo "<p>".$err['password']."</p>"?>
                <label for="name">パスワード</label>
                <input type="password" name="password">
            </p>
            <p>
                <?php if(isset($err['password_conf']))echo "<p>".$err['password_conf']."</p>"?>
                <label for="password_conf">パスワード確認</label>
                <input type="password" name="password_conf">
            </p>

            <p class="input">
            <button type="submit">新規登録確認画面へ</button>
            </p>
        </div>

        <div class="login_link"><a class="link" href="./mg_login.php">MGログインはこちらから</a></div>

        



    </form>
</div>
</body>
</html>