<?php

namespace App\models;
class Sku {
    private string $dvd = '';
    private string $book = '';
    private string $furniture = '';

    public function __construct($dvd, $book, $furniture){
        $this->dvd = $dvd;
        $this->book = $book;
        $this->furniture = $furniture;
    }

    public function getDvd(){
        return $this->dvd;
    }
    public function getBook(){
        return $this->book;
    }
    public function getFurniture(){
        return $this->furniture;
    }
}