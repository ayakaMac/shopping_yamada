<?php
session_cache_limiter('none');
session_start();
require_once(ROOT_PATH.'Controllers/itemController.php');

$itemController = new itemController();

$item = $itemController->GetAll();

if(isset($_GET['item_name'])){
    if ($_GET['item_name'] != "") {
        $search_item = $itemController->Search();
        $item = $search_item;
    }



}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $item_id = $_POST['items_id'];
    $kosuu = (int)$_POST['kosuu'];
    $price = $_POST['item_price'];

    $_SESSION['total_price'] += $kosuu * $price;


    //すでにカートの中身が存在する場合と存在しない場合を想定
    if(isset($_SESSION['cart'][$item_id])) {
        $before_items = $_SESSION['cart'][$item_id];
        $_SESSION['cart'][$item_id] = $kosuu + $before_items; //セッションにデータを格納
        header("Location:/user/search.php");
        exit(); 
    } else {
        $_SESSION['cart'][$item_id] = $kosuu; //セッションにデータを格納
        header("Location:/user/search.php");
        exit(); 
    }
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">

    <title>選択・検索</title>
</head>
<body>
    <header>
    <div class="header__inner">
        <h1 class="header__title header-title">
          <a href="#">
          <li class="shop_name">YAMADA</li>
          </a>
        </h1>

        <nav class="header__nav nav" id="js-nav">
          <ul class="nav__items nav-items">
          <li class="mypage"><a class="mypage_link" href="./myPage.php">マイページ</a></li>
          </ul>
        </nav>

        <button class="header__hamburger hamburger" id="js-hamburger">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
        <ul>
        <li class="shop_name">YAMADA</li>
        
        </ul>
    </header>
    
    <form action="#" method="get">
        <p>
            <div class="search_button">
                <select class="item_name" name="item_name">
                    <option value="">商品すべて見る</option>
                    <option value="Tシャツ">Tシャツ</option>
                    <option value="靴下">靴下</option>
                    <option value="帽子">帽子</option>
                    <option value="ズボン">ズボン</option>
                    <option value="靴">靴</option>
                    <option value="パンツ">パンツ</option>
                    <option value="スカート">スカート</option>
                </select>
                <button class="search" type="submit">検索</button>
            </div>
       </p>
    </form>
    
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
                <form action="#" method="post">
                <td>
                    <select name="kosuu">
                        <?php for($i = 0; $i <= $item_data['item_count']; $i++):?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php endfor;?>
                    </select>
                </td>
                    <input type="hidden" name="item_price" value="<?=$item_data['item_price']?>">
                    <input type="hidden" name="items_id" value="<?=$item_data['items_id']?>">
                    <td><button class="delete" type="submit">カートに入れる</button></td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>

    <form action="#" method="get">


        <div class="cart"><a class="cart_link" href="/user/cart.php">カートを見る</a></div>
 
        <div class="mypage"><p><a class="mypage_link" href="/user/search.php">リセット</a></p></div>

    
    </form>


</div>

    


<h1 class="shop_name">　　　</h1>

<div class="for-scroll"></div>
<div id="js-scroll-top" class="scroll-top">TOP</div>


<script src="/js/action.js"></script>
</body>
</html>