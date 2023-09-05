<?php
session_start();

require_once(ROOT_PATH .'Controllers/userController.php');
require_once(ROOT_PATH .'Controllers/validation.php');

$userController = new userController();
$validation = new validation();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $err = $validation->LoginCheck();
    if(empty($err)){
        $result = $userController->Login();
        if($_SESSION['user_data']['role'] !== 1){
            $role_err = "登録されていません。";
        } else {
            if ($result){
                header('location:mg_search.php');
                exit;
            } else {
                $login_err = $_SESSION;
            }
        }

    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user_style.css">

    <title>MGログイン</title>
</head>
<body>
<div class="signup">
<h2 class="signup_header">MGログイン</h2>
<form action="#" method="post" autocomplete="off">
     <div class="data">
        <p>
        <?php if(isset($role_err))echo"<p>".$role_err."</p>"?>
        <?php if(isset($login_err['password_err']))echo"<p>".$login_err['password_err']."</p>"?>

        <?php if(isset($login_err['email_err']))echo "<p>".$login_err['email_err']."</p>"?>
        <?php if(isset($err['email']))echo "<p>".$err['email']."</p>"?>

            <label for="email">メールアドレス</label>
            <input type="email" name="email">
        </p>
        
        <p>
        <?php if(isset($err['password']))echo "<p>".$err['password']."</p>"?>

            <label for="password">パスワード</label>
            <input type="password" name="password" >
        </p>
        
        <p class="input">
            <button type="submit">ログイン</button>
        </p>
        
    </div>

    <div class="login_link"><a class="link" href="./mg_signUp.php">MG新規登録はこちらから</a></div>

</form>
</div>

    
</body>
</html>