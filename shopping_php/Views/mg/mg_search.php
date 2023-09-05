<?php
session_start();

require_once(ROOT_PATH.'Controllers/itemController.php');
$user = $_SESSION['user_data'];

if(!$user){
    header('location:./mg_login.php');
    exit;
}

$item_data = new itemController();

$item = $item_data->GetAll();

if(isset($_GET['item_name'])){
    
    $search_item = $item_data->Search();
    $item = $search_item;

}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">

    <title>検索・選択</title>
</head>
<body>
    <header>
        <ul>
         <li class="shop_name">YAMADA</li>
         <li class="mypage"><a class="mypage_link" href="./mg_myPage.php">マイページ</a></li>
        </ul>
    </header>

    <form action="#" method="get">
       <p>
            <div class="search_button">

                <select class="item_name" name="item_name">
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
        </tr>
        
        <?php foreach($item as $item_data):?>
            <tr>
                <td><?=$item_data['item_name']?></td>
                <td><?=$item_data['item_price']?>円</td>
                <td><?=$item_data['item_count']?>個</td>
                <td><img src="/img/<?=$item_data['img']?>" alt=""  width="60px" height="60px"></td>
                <td><div class="cart"><a class="delete_link" href="mg_item_delete.php?id=<?=$item_data['items_id']?>">消去</a></div></td>

                
            </tr>
        <?php endforeach; ?>

        
    </table>


    <form action="#" method="get">


        <div class="cart"><a class="cart_link" href="mg_item_register.php">商品登録</a></div>

        <div class="mypage"><p><a class="mypage_link" href="/mg/mg_search.php">リセット</a></p></div>


    </form>

</body>
</html>