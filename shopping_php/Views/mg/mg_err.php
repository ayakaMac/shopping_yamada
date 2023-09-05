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
    <title>商品登録エラー</title>
</head>
<body>
    <h1>商品登録エラー</h1>

    <a href="./mg_item_register_conf.php">戻る</a>
    
</body>
</html>