<?php
namespace App\models;

class Furniture extends Product {
    public function __construct($data){ //gets associative array
        parent::__construct($data);
    }
    function setDescriptionName(){
        $this->descriptionName = 'dimensions';
    }
    function setDescriptionNumber(){
        $this->descriptionNumber = $this->userData['height'].'x'.$this->userData['width'].'x'.$this->userData['length'];
    }
    function setUnit(){
        $this->unit = 'Cm';
    }
}