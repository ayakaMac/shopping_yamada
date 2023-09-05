<?php

session_cache_limiter('none');
session_start();
require_once(ROOT_PATH.'Controllers/itemController.php');

$itemController = new itemController();

$values= array_keys($_SESSION['cart']);

$item = $itemController->Item_Get($values);

$result = $itemController->Item_Delete($_SESSION['cart']);

$itemController->Zaiko_Search();











?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">
    <link rel="stylesheet" href="/css/user.css">
    <title>購入完了</title>
</head>
<body>


    <header>
        <ul>
        <li class="shop_name">YAMADA</li>
        <li class="mypage"><a class="mypage_link" href="./myPage.php">マイページ</a></li>
        </ul>
    </header>


    <?php if($result === 0):?>
        <h1 class="buy">購入に失敗しました</h1>
    <?php else :?>
        <h1 class="buy">購入完了</h1>

    <?php endif ?>





<div class="cart"><a class="cart_link" href="./search.php">検索画面へ</a></div>


<h1 class="shop_name">　　　</h1>
    
</body>
</html>