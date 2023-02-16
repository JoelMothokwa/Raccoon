<?php 

require_once dirname(__DIR__).DIRECTORY_SEPARATOR."src/shop.class.php";

class ShopController {
    private $items = null;
    
    public function __construct(){
        
        global $con;
        
        try {
            
            $qry = "SELECT s.product_name, s.description, s.quantity, s.checked, s.deleted\n"
                    . "FROM shops s\n"
                    . "WHERE s.deleted=0\n"
                    . "ORDER BY s.product_name ASC";
            $oSTMT = $con->prepare($qry);
            $oSTMT->execute();
            $this->items = $oSTMT->fetch(\PDO::FETCH_OBJ);
            $oSTMT->closeCursor();
            unset($oSTMT);
            
        } catch (Exception $ex) {

        }
    }
    
    public function add(Shop $shop){
        global $con;
        
        try {
            
            $qry = "INSERT INTO shops ( product_name, description, quantity)\n"
                    . "VALUES (:product_name, :description, :quantity)\n";
            $oSTMT = $con->prepare($qry);
            $oSTMT->bindValue(":product_name", $shop->product_name);
            $oSTMT->bindValue(":description", $shop->description);
            $oSTMT->bindValue(":quantity", $shop->quantity);
            $oSTMT->execute();
            $oSTMT->closeCursor();
            unset($oSTMT);
            
        } catch (Exception $ex) {

        }
        
        return true;
    }
    
    public function edit(Shop $shop){
        
        global $con;
        
        try {
            $qry = "UPDATE shops SET \n"
                    . "product_name=:product_name,\n"
                    . "description=:description,\n"
                    . "quantity=:quantity\n"
                    . "WHERE id=:id\n";
            $oSTMT = $con->prepare($qry);
            $oSTMT->bindValue(":quantity", $shop->id);
            $oSTMT->bindValue(":product_name", $shop->product_name);
            $oSTMT->bindValue(":description", $shop->description);
            $oSTMT->bindValue(":quantity", $shop->quantity);
            $oSTMT->execute();
            $id = $con->lastInsertID();
            $oSTMT->closeCursor();
            unset($oSTMT);
        } catch (Exception $ex) {

        }
        
        
    }
    
    public function delete(int $id){
        global $con;
        
        try {
            $qry = "UPDATE shops SET \n"
                    . "deleted=1\n"
                    . "WHERE id=:id\n";
            $oSTMT = $con->prepare($qry);
            $oSTMT->bindValue(":id", $id);
            $oSTMT->execute();
            $oSTMT->closeCursor();
            unset($oSTMT);
        } catch (Exception $ex) {

        }
        
        
        return true;
    }
    
    public function markItem(int $id){
        global $con;
        
        try {
            $qry = "UPDATE shops SET \n"
                    . "marked=1\n"
                    . "WHERE id=:id\n";
            $oSTMT = $con->prepare($qry);
            $oSTMT->bindValue(":id", $id);
            $oSTMT->execute();
            $oSTMT->closeCursor();
            unset($oSTMT);
        } catch (Exception $ex) {

        }
        
        return true;
    }
}



