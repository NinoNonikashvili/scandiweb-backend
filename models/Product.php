<?php

namespace App\models;

abstract class Product {
    protected $userData;
    protected $name;
    protected $sku;
    protected $price;
    protected $descriptionName;
    protected $descriptionNumber;
    protected $unit;

    public function __construct($data){
        $this->userData = $data;
        $this->name = $data['name'];
        $this->sku = $data['SKU'];
        $this->price = $data['price'];
    }
    function getName(){
        return $this->name;
    }
    function getSku(){
        return $this->sku;
    }
    function getPrice(){
        return $this->price;
    }
    function getDescName(){
        return $this->descriptionName;
    }
    function getDescNumber(){
        return $this->descriptionNumber;
    }
    function getUnit(){
        return $this->unit;
    }

    abstract function setDescriptionName();
    abstract function setDescriptionNumber();
    abstract function setUnit();
}