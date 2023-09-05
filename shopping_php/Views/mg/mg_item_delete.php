<?php
session_start();
require_once(ROOT_PATH.'Controllers/itemController.php');

$user = $_SESSION['user_data'];

if(!$user){
    header('location:./mg_login.php');
    exit;
}

$item_data = new itemController();

$item = $item_data->Delete();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">

    <title>消去</title>
</head>
<body>

    <header>
        <ul>
         <li class="shop_name">YAMADA</li>
         <li class="mypage"><a class="mypage_link" href="./mg_myPage.php">マイページ</a></li>
        </ul>
    </header>


    <?php if($item):?>
        <h2 class="comment">消去しました。</h1>
    <?php else:?>
        <h2 class="comment">消去できませんでした。</h1>
    <?php endif;?>
    
    
    <div class="cart"><a class="cart_link"href="./mg_search.php">戻る</a></div>

    <div class="cart"><a class="cart_link" href="./mg_top.php">トップ画面へ</a></div>

    <h1 class="shop_name">　　　</h1>



    
</body>
</html>