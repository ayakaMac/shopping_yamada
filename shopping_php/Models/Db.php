<?php 
//database.phpを使えるようにしてDBの接続を行うファイル
require_once(ROOT_PATH . '/database.php');

class Db {
    protected $dbh; //変数を用意
    
    //__constructはインスタンス化されたときに自動で実行される
    public function __construct($dbh = null) {
        if(!$dbh) {
            try {
                $this->dbh = new PDO(
                    'mysql:dbname='.DB_NAME.
                    ';host='.DB_HOST, DB_USER, DB_PASSWD
                );
            }catch (PDOException $e) {
                echo"接続失敗:" .$e->getMessage() . "\n";
                exit();
            }

        }else {
            $this->dbh = $dbh;
        }
    }
}



?>