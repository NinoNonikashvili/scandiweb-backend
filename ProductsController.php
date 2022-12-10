<?php

namespace App;
use App\models\ProductBuilder;
use App\models\Sku;

class ProductsController {
    public static function fetchData(Router $router){
        $products = $router->database->getData();
        echo json_encode($products);
    }
    public static function fetchSkus(Router $router){
        //get data from db
        // $products = $router->database->getProducts($keyword);
        $skus = $router->database->getSkus();
        echo json_encode($skus);
    }
    public static function create(Router $router){ 

        if($_SERVER['REQUEST_METHOD']==='POST'){
            echo json_encode($_POST);
            $prod = ProductBuilder::selectProduct($_POST);
            $prod->setDescriptionName();
            $prod->setDescriptionNumber();
            $prod->setUnit();
            $router->database->createData($prod);

            $skus = new Sku($_POST['dvd'], $_POST['book'], $_POST['furniture'] ); //frontend gives full package
            $router->database->updateSkus($skus);
        }


    }

    public static function delete(Router $router){ 
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $stringData = file_get_contents('php://input');
            $arrayData = explode(',', $stringData);
            echo $arrayData[0], $arrayData[1];
            $router->database->deleteData($arrayData);
            echo 'delete function called';
        } 


    }  
}
