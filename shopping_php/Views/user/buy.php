<?php

session_cache_limiter('none');
session_start();
require_once(ROOT_PATH.'Controllers/itemController.php');

$itemController = new itemController();

$values= array_keys($_SESSION['cart']);

$item = $itemController->Item_Get($values);








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">
    <title>購入ページ</title>
</head>
<body>
    <header>
        <ul>
        <li class="shop_name">YAMADA</li>
        <li class="mypage"><a class="mypage_link" href="./myPage.php">マイページ</a></li>
        </ul>
    </header>
    <table>
        <tr>
            <th>商品名</th>
            <th>商品価格</th>
            <th>在庫数</th>
            <th>画像</th>
            <th>数量</th>
            
        </tr>


        <?php foreach($item as $item_data):?>
            <tr>
                <td><?=$item_data['item_name']?></td>
                <td><?=$item_data['item_price']?>円</td>
                <td><?=$item_data['item_count']?>個</td>

                <td><img src="/img/<?=$item_data['img']?>" alt=""  width="60px" height="60px"></td>
                <form action="./buy_item.php" method="post">
                <td>
                    <select name="kosuu">
                        <?php for($i = 0; $i <= $item_data['item_count']; $i++):?>
                        <option value=<?=$i?> <?php if ($_SESSION['cart'][$item_data['items_id']] === $i) echo 'selected' ?>><?=$i?></option>
                        <?php endfor;?>
                    </select>
                    <input type="hidden" value="<?=$item_data['item_price']?>" name="item_price">
                    <input type="hidden" value="<?=$item_data['items_id']?>" name="items_id">
                </td>
                </form>
            </tr>


        <?php endforeach; ?>


    </table>



    <div class="price_button"><p class="price">商品合計<?php echo $_SESSION['total_price'];?>円</p></div>

    <div class="total_button"><button class="total" onclick="location.href='./buy_item.php'">購入する→</button></div>
    
    <div class="cart"><a class="cart_link"href="./cart.php">戻る</a></div>



    
    <h1 class="shop_name">　　　</h1>

</body>
</html>
