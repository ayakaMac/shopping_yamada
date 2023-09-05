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

    <title>マイページ</title>
</head>
<body>
<header>
        <ul>
        <li class="shop_name">YAMADA</li>
        </ul>
</header>

<?php if(isset($_SESSION['user_data']['name'])):?>
    <h2 class="comment"><?=$_SESSION['user_data']['name']?>さん</h2>
<?php endif;?>

<div class="cart"><a class="cart_link" href="./search.php">検索画面へ</a></div>
<div class="cart"><a class="cart_link" href="./logout.php">ログアウト</a></div>


<h1 class="shop_name">　　　</h1>


    
</body>
</html>