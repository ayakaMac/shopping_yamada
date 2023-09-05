<?php
session_start();
require_once(ROOT_PATH.'Controllers/itemController.php');
require_once(ROOT_PATH.'Controllers/validation.php');
//再送信表示させない
header('Expires:-1');
header('Cache-Control:');
header('Pragma:');


$user = $_SESSION['user_data'];

if(!$user){
    header('location:./mg_login.php');
    exit;
}

define( "FILE_DIR", ROOT_PATH."public/img/");

$itemController = new itemController();

$validation = new validation();

$img = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    	// ファイルのアップロード
	if( !empty($_FILES['img']['tmp_name']) ) {

		$upload_res = move_uploaded_file($_FILES['img']['tmp_name'], FILE_DIR.$_FILES['img']['name']);

		if(!$upload_res) {
			$error[] = 'ファイルのアップロードに失敗しました。';
		} else {
			$img = $_FILES['img']['name'];  
		}
        

	}
    $err = $validation->item_register_check($img);


    
    if(empty($err)){
        header('location:mg_item_register_conf.php');
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

    <title>商品登録</title>
</head>
<body>

<header>
        <ul>
        <li class="shop_name">YAMADA</li>
        <li class="mypage"><a class="mypage_link" href="./mg_myPage.php">マイページ</a></li>
        </ul>
    </header>

    <h1 class="buy">商品登録</h1>
    <form action="#" method="post"></form>

   
    <div class="center">
        <form action="#" method="POST" enctype="multipart/form-data">
            <p>
                <?php if(isset($err['item_name']))echo "<p>".$err['item_name']."</p>"?>
                <label for="name">商品名</label>
                <input type="text" name="item_name">
            </p>

            <p>
                <?php if(isset($err['item_price']))echo "<p>".$err['item_price']."</p>"?>
                <label for="name">商品価格</label>
                <input type="number" name="item_price">
            </p>

            <p>
                <?php if(isset($err['item_count']))echo "<p>".$err['item_count']."</p>"?>
                <label for="name">商品数</label>
                <input type="number" name="item_count">
            </p>

            <p>
            <?php if(isset($err['img']))echo "<p>".$err['img']."</p>"?>
            <label>画像ファイルの添付</label>
            <input class="img_file" type="file" name="img">
            </p>

            

            

            <div class="total_button"><button class="total" onclick="location.href='./my_item_register_conf.php'">商品登録確認画面へ</button></div>

            
            <div class="cart"><a class="cart_link"href="./mg_search.php">商品検索画面へ</a></div>

            
        </form>
    </div>

    <h1 class="shop_name">　　　</h1>

    

    
</body>
</html>
