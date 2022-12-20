<?php
/**
 * Database file.
 *
 * PHP Version 8.1.10
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */

namespace App;

/**
 * Class to communicate with database.
 *
 * PHP Version 8.1.10
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */

class Db
{
    public $pdo=null;
    public static ?Db $dbInstance = null;

    /**
     * Constructor to initialize pdo object.
     *
     * @return void
     */
    public function __construct()
    {
        $dbProperties = 'mysql:host=localhost;  port = 3306; dbname=products_crud';
        $this->pdo = new \PDO($dbProperties, 'root', '');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$dbInstance = $this;
    }
    /**
     * Get data from db
     *
     * @return the data from db in json format
     */
    public function getData()
    {
        $dbCommand = 'SELECT * FROM scandiweb_products ORDER BY id DESC';
        $statement = $this->pdo->prepare($dbCommand);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    /**
     * Save the product in db.
     *
     * @param $product product which is to be stored in db table.
     * 
     * @return void
     */
    public function createData($product)
    {
        $dbCommand = 'INSERT INTO scandiweb_products(name, sku, price, description_name, description_number, unit) VALUES(:name, :sku, :price, :description_name, :description_number, :unit)';
        $statement = $this->pdo->prepare($dbCommand);  
        $statement->bindValue(':name', $product->getName());
        $statement->bindValue(':sku', $product->getSku());
        $statement->bindValue(':price', $product->getPrice());
        $statement->bindValue(':description_name', $product->getDescName());
        $statement->bindValue(':description_number', $product->getDescNumber());
        $statement->bindValue(':unit', $product->getUnit());
        $statement->execute();
    }
    /**
     * Delete data from db.
     * 
     * @param $ids id(s) of products which will be deleted
     *
     * @return void
     */
    public function deleteData($ids)
    {
        for ($i=0; $i<sizeof($ids); $i++) {
            $dbCommand = 'DELETE FROM scandiweb_products WHERE id = :id';
            $statement = $this->pdo->prepare($dbCommand);
            $statement->bindValue(':id', $ids[$i]);
            $statement->execute();
        }
    }
}
