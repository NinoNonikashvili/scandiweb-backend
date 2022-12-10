<?php

namespace App\models;


class ProductBuilder{
    protected static $product;
    public static function selectProduct($data){
        switch($data['productType']){
            case 'DVD':
                $product = new Dvd($data);
                break;
            case 'Book':
                $product = new Book($data);               
                break;
            case 'Furniture':
                $product = new Furniture($data);               
                break;
        }
        return $product;

    }

}
