<?php
namespace App;

class Db {

    public $pdo=null;
    public static ?Db $dbInstance = null;

    public function __construct(){
        $this->pdo = new \PDO('mysql:host=localhost;  port = 3306; dbname=products_crud', 'root', '');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$dbInstance = $this;
    }
    public function getData(){
        $statement = $this->pdo->prepare('SELECT * FROM scandiweb_products ORDER BY id DESC');
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getSkus(){
        $statement = $this->pdo->prepare('SELECT * FROM scandieb_skus');
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function updateSkus($skus){
        $statement = $this->pdo->prepare('UPDATE scandieb_skus SET 
        dvd = :dvd,
        book = :book,
        furniture = :furniture');
        $statement->bindValue(':dvd', $skus->getDvd());
        $statement->bindValue(':book', $skus->getBook());
        $statement->bindValue(':furniture', $skus->getFurniture());
        $statement->execute();

    }
    public function createData($product){
        //create appropriate model for product type
        $statement = $this->pdo->prepare('INSERT INTO scandiweb_products(name, sku, price, description_name, description_number, unit)
        VALUES(:name, :sku, :price, :description_name, :description_number, :unit)');
        $statement->bindValue(':name', $product->getName());
        $statement->bindValue(':sku', $product->getSku());
        $statement->bindValue(':price', $product->getPrice());
        $statement->bindValue(':description_name', $product->getDescName());
        $statement->bindValue(':description_number', $product->getDescNumber());
        $statement->bindValue(':unit', $product->getUnit());
        $statement->execute();
        
    }
    public function deleteData($ids){
        for($i=0; $i<sizeof($ids); $i++ ){
            $statement = $this->pdo->prepare('DELETE  FROM scandiweb_products WHERE id = :id');
            $statement->bindValue(':id', $ids[$i]);
            $statement->execute();
        }

        
    }

}