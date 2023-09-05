<?php
session_cache_limiter('none');
session_start();
require_once(ROOT_PATH.'Controllers/itemController.php');
$itemController = new itemController();

//sessionのcartとtotal_priceの金額を減らす必要がある

$kosuu = (int)$_POST['kosuu'];
$item_price = (int)$_POST['item_price'];
$id = $_POST['items_id'];

if (!empty($id)) {
    unset($_SESSION['cart'][$id]);
    $_SESSION['total_price'] -= $item_price * $kosuu;
    header("Location:/user/cart.php");
    exit(); 
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="get">
    
    
    </form>
    
</body>
</html>