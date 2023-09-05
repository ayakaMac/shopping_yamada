<?php
session_start();

$user = $_SESSION['user_data'];

if(!$user){
    header('location:./mg_login.php');
    exit;
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">
    <title>商品登録完了</title>
</head>

<body>

    <header>
        <ul>
        <li class="shop_name">YAMADA</li>
        <li class="mypage"><a class="mypage_link" href="./mg_myPage.php">マイページ</a></li>
        </ul>
    </header>

    <h1 class="buy">商品登録完了</h1>

<div class="cart"><a class="cart_link" href="./mg_item_register.php">商品登録へ</a></div>

<div class="cart"><a class="cart_link"href="./mg_item_register_conf.php">戻る</a></div>

    

<h1 class="shop_name">　　　</h1>

    
</body>
</html>