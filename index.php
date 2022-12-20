<?php
/**
 * Products CRUD backend index file.
 *
 * PHP Version 8.1.10
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */


header('Access-Control-Allow-Origin: *');
require_once __DIR__.'/vendor/autoload.php';

use App\Router;
use App\ProductsController;
use App\Db;

$db = new Db();
$router = new Router($db);


$router->get('/', [ProductsController::class, 'fetchData']);
$router->post('/create', [ProductsController::class, 'create']);
$router->post('/delete', [ProductsController::class, 'delete']);
$router->resolve();