<?php
namespace App\models;

class Book extends Product {
    public function __construct($data){ //gets associative array
        parent::__construct($data);
    }
    function setDescriptionName(){
        $this->descriptionName = 'weight';
    }
    function setDescriptionNumber(){
        $this->descriptionNumber = $this->userData['weight'];
    }
    function setUnit(){
        $this->unit = 'Kg';
    }
}