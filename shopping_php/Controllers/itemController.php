<?php

require_once(ROOT_PATH .'/Models/item.php');

class itemController {
    protected $item;
    protected $req;
     
    
    public function __construct()
    {
       $this->item = new item();

       $this->req['req_get'] = $_GET;
       $this->req['req_post'] = $_POST;
       
       
    }


    public function Item_Register(){

        $result = $this->item->item_register($this->req['req_post']);
        return $result;
    }

    
    public function GetAll(){

        $result = $this->item->getAll();{
        return $result;
        }
    }

    public function Delete(){

        $result = $this->item->delete($this->req['req_get']['id']);


        if($result === 1){
            return true;
        } else {
            return false;
        }
        
    }

    public function Search(){

        $result = $this->item->search($this->req['req_get']['item_name']);

        return $result;

    }

    public function Cart(){

        $result = $this->item->cart($this->req['req_post']['items_id']);

        return $result;

    }

    public function Item_Get($item_key){

        $result = $this->item->item_get($item_key);

        return $result;
    }

    public function Item_Delete($cart){

        $result = $this->item->item_delete($cart);

        return $result;
    }

    public function Zaiko_Search(){

        $this->item->zaiko_search();

    }


    
    
}


?>
