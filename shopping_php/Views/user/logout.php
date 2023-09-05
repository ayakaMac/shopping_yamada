<?php

session_start();
$_SESSION = array();
session_destroy();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">

    <title>ログアウト</title>

    <header>
        <ul>
        <li class="shop_name">YAMADA</li>
        </ul>
    </header>

    <h2 class="comment">ログアウト完了しました</h2>


    <div class="cart"><a class="cart_link" href="./login.php">ログインはこちらから</a></div>


    <h1 class="shop_name">　　　</h1>

</head>
<body>



    
</body>
</html>