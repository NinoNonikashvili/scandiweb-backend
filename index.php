<?php
header( 'Access-Control-Allow-Origin: *');
require_once __DIR__.'/vendor/autoload.php';

use App\Router;
use App\ProductsController;
use App\Db;
use App\models\ProductBuilder;
//create routing, db object

$db = new Db();
$router = new Router($db);


// $prod = ProductBuilder::selectProduct($obj);
// $prod->setDescriptionName();
// $prod->setDescriptionNumber();
// $prod->setUnit();

// echo '<pre>';
// var_dump($prod);
// echo '</pre>';
if($_SERVER['REQUEST_METHOD']==='POST'){
    echo '<pre>';
    var_dump($_POST);
    echo '</pre';
}

$router->get('/', [ProductsController::class, 'fetchData']);
$router->get('/skus', [ProductsController::class, 'fetchSkus']);
$router->post('/create', [ProductsController::class, 'create']);
$router->post('/delete', [ProductsController::class, 'delete']);

$router->resolve();