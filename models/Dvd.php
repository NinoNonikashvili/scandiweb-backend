<?php
namespace App\models;

class Dvd extends Product {
    public function __construct($data){ //gets associative array
        parent::__construct($data);
    }
    function setDescriptionName(){
        $this->descriptionName = 'size';
    }
    function setDescriptionNumber(){
        $this->descriptionNumber = $this->userData['size'];
    }
    function setUnit(){
        $this->unit = 'Mb';
    }
}