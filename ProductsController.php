<?php
/**
 * Controller file.
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
use App\models\ProductBuilder;
/**
 * Products controller class.
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */
class ProductsController
{
    /**
     * Fetch and display json file containing produtcts' list.
     *
     * @param $router to have an access to DB instance
     * 
     * @return void
     */
    public static function fetchData(Router $router)
    {
        $products = $router->database->getData();
        echo json_encode($products);
    }
    /**
     * Create appropriate model object based on the type of product that is passed
     * From frontend and pass it to database to store.
     *
     * @param $router to have an access to DB instance
     * 
     * @return void
     */
    public static function create(Router $router)
    {   
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $prod = ProductBuilder::selectProduct($_POST);
            $prod->setDescriptionName();
            $prod->setDescriptionNumber();
            $prod->setUnit();
            $router->database->createData($prod);
        }
    }
    /**
     * Delete product(s) corresponding to the id(s) passed from frontend.
     *
     * @param $router to have an access to DB instance
     * 
     * @return void
     */
    public static function delete(Router $router)
    { 
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $stringData = file_get_contents('php://input');
            $arrayData = explode(',', $stringData);
            $router->database->deleteData($arrayData);
            echo 'delete function called';
        } 
    }  
}