<?php 


class Shop {
    
    public $id;
    public $product_name;
    public $description;
    public $quantity;
    public $checked;
    public $deleted;
    
    public function __construct ($id, $product_name, $description = null, $quantity=0, $checked=false, $deleted=false){
        $this->id = $id;
        $this->product_name = $product_name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->checked = $checked;
        $this->deleted = $deleted;
    }
}