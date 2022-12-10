<?php

namespace App;
use App\Db;
class Router {
    private array $getRoutes = [];
    private array $postRoutes = [];
    public ?Db $database = null;

    public function __construct($db){
        $this->database = $db;
    }

    public function get($url, $fn){
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn){
        $this->postRoutes[$url] = $fn;
    }

    public function resolve(){
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        if(strpos($url, '?') !== false){
            $url = substr($url, 0, strpos($url, '?'));
        }
        if($method==='get')
        {
            $fn = $this->getRoutes[$url] ?? null; 
        }elseif($method==="post")
        {
            $fn = $this->postRoutes[$url] ?? null; 
        }
        if($fn===null){
            echo 'page not found'; 
            exit();
        }
        call_user_func($fn, $this);
    }
}