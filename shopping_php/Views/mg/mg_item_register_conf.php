<?php
session_start();

require_once(ROOT_PATH.'Controllers/itemController.php');
require_once(ROOT_PATH .'/Models/item.php');

$user = $_SESSION['user_data'];

if(!$user){
    header('location:./mg_login.php');
    exit;
}

$itemController = new itemController();

$item_data = $_SESSION;




if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $result = $itemController->Item_Register();
    if(!$result){
        $_SESSION['item_err'] = ['商品を登録できませんでした。'];
        header('location:mg_err.php');
        exit;
    } else {
        header('location:mg_item_register_comp.php');
        exit;

    } 
}
// $_SESSION = array();
// session_destroy();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">

    <title>商品登録確認</title>

</head>
<body>

    <header>
        <ul>
        <li class="shop_name">YAMADA</li>
        <li class="mypage"><a class="mypage_link" href="./mg_myPage.php">マイページ</a></li>
        </ul>
    </header>

    <h1 class="buy">商品登録確認</h1>

    <div class="center">
        <form action="#" method="POST" enctype="multipart/form-data">
            <p>
            <label for="item_name">商品名</label>
                <input type="text" name="item_name" value=<?=$item_data['item_name'];?> readonly>
            </p>

            <p>
            <label for="item_price">商品価格</label>
                <input type="text" name="item_price" value=<?=$item_data['item_price'];?> readonly>
            </p>

            <p>
            <label for="item_count">商品数</label>
                <input type="text" name="item_count" value=<?=$item_data['item_count'];?> readonly>
            </p>
            <p>
            <label for="img">画像</label>
                <img src="/img/<?=$item_data['img'];?>" alt="" width="" >
                <input type="text" name="img" value=<?=$item_data['img'];?> readonly>
            </p>
            
                    
            <div class="total_button"><button class="total" onclick="location.href='./my_item_register_conf.php'">商品登録</button></div>


            </form>

            <div class="cart"><a class="cart_link" href="./mg_item_register.php">戻る</a></div>


    </div>

    
    <h1 class="shop_name">　　　</h1>





    
</body>
</html>