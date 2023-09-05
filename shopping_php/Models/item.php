<?php

require_once(ROOT_PATH .'/Models/Db.php');

class item extends Db {

    public function __construct()
    {
        parent::__construct($dbh = null);
    }


    public function item_register($item_data){

        $result = false;
        $sql = 'INSERT INTO item(item_name,item_price,item_count,img) VALUES (?,?,?,?)';

        $arr = [];
        $arr[] = $item_data['item_name'];
        $arr[] = $item_data['item_price'];
        $arr[] = $item_data['item_count'];
        $arr[] = $item_data['img'];
        // tryの前でトランザクション開始
        $this->dbh->beginTransaction();

        try{
            $stmt = $this->dbh->prepare($sql);
            $touroku = $stmt->execute($arr);
            // 実行後にcommit
            $this->dbh->commit();

            if(!$touroku){
                return $result;
            }
            $result = true;
            return $result;
            
        }catch(\Exception $e){
            echo '登録失敗'.$e->getMessage();
            return $result;

            //失敗時にロールバック
            $this->dbh->rollBack();
            exit();
        }

        
    }

    public function getAll(){
        
        $sql = 'SELECT * FROM item';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result; 
        
    }

    public function delete($item_data){

      
        $sql = 'DELETE FROM item WHERE items_id = ?';

        $arr = [];
        $arr[] = $item_data;
        
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($arr);
        $result = $stmt->rowCount();
    
        return $result;
        
    }

    public function search($item_data){

        $sql = 'SELECT * FROM item WHERE item_name = ?';

        $arr = [];
        $arr[] = $item_data;

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($arr);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
    }

    
    public function cart($items_id){

        $sql = 'SELECT * FROM item WHERE items_id = ?';

        $arr = [];
        $arr[] = $items_id;

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($arr);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    
    }

    public function item_get($item_id){

        $sql = "SELECT * FROM item WHERE items_id IN (".implode(',',$item_id).");";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }


    public function item_delete($cart){
        $result = 0;
        foreach ($cart as $key => $value){
            $sql = "UPDATE item SET item_count = item_count - $value WHERE items_id = $key";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $result += $stmt->rowCount();
        }
        return $result;
    }

    public function zaiko_search(){


        $sql = "SELECT items_id FROM item WHERE item_count = 0";
        
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)){
            $this->zaiko_delete($result);
        }

    }

    public function zaiko_delete($id){
        var_dump($id);
        exit;

        $arr = [];
    
        foreach ($id as $value){
        
            $sql = 'DELETE FROM item WHERE items_id = ?';

           
            $arr[] = $value;
            
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($arr);
            $stmt->rowCount();
        }


    }

}

    

?>
