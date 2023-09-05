<?php
session_start();

require_once(ROOT_PATH.'Controllers/userController.php');

$userController = new userController();

$data = $_SESSION;

// $user = $_SESSION['user_data'];

// if(!$user){
//     header('location:./mg_login.php');
//     exit;
// }

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['role'] = 1;
    $result = $userController->Create_User();
    if(!$result){
        session_destroy();
        session_start();
        $_SESSION['signup_err'] = '登録できませんでした。';
        header('location:mg_signUp.php');
        exit;
    }else{
        session_destroy();
        header('location:mg_signUp_comp.php');
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
    <title>MG新規登録確認画面</title>
</head>
<body>
<div class="signup">

    <h2 class="signup_header">MG新規登録確認</h2>
    <form action="#" method="POST">
        
        <div class="data">

            <p>
            <label for="name">ユーザ名</label>
                <input type="text" name="name" value=<?=$data['name'];?> readonly>
            </p>

            <p>
                <select name="age" readonly>
                <option><?=$data['age'];?></option>
                </select>歳
            </p>

            <p>
            <label for="name">メールアドレス</label>
                <input type="text" name="email" value=<?=$data['email'];?> readonly>
            </p>
            <p>
            <label for="name">パスワード</label>
                <input type="text" name="password" value=<?=$data['password'];?> readonly>
            </p>
            
                    
            <p class="input">
                <button type="submit">新規登録</button>
            </p>

        </div>
    </form>

</div>

   
    
</body>
</html>