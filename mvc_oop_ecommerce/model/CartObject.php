<?php
require_once "model/ProductObject.php";

class CartObject extends ProductObject{
    private $quantity;

    public function __construct($row)
    {
        parent::__construct($row);
        $this->quantity = $row['Quantity'];
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    

    public function getTotalPriceEachProduct(){
        return $this->getPrice() * $this->quantity;
    }
}