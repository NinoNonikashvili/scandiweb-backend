<?php
/**
 * The file for Router class.
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
use App\Db;

/**
 * Router class
 *
 * This class calls appropriate function for each url request
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */

class Router
{
    private array $_getRoutes = [];
    private array $_postRoutes = [];
    public ?Db $database = null;
    /**
     * Constructor to initialize $database
     *
     * @param $db to have an access to DB instance
     * 
     * @return void
     */
    public function __construct($db)
    {
        $this->database = $db;
    }
    /**
     * Allocate url names and corresponding functions in associative array.
     *
     * @param $url possible GET request ending
     * @param $fn  function for each GET request
     * 
     * @return void
     */
    public function get($url, $fn)
    {
        $this->_getRoutes[$url] = $fn;
    }
    /**
     * Allocate url names and corresponding functions in associative array.
     *
     * @param $url possible POST request ending
     * @param $fn  function for each POST request
     * 
     * @return void
     */
    public function post($url, $fn)
    {
        $this->_postRoutes[$url] = $fn;
    }
    /**
     * Determine current request and call appropriate function.
     * 
     * @return void
     */
    public function resolve()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        if (strpos($url, '?') !== false) {
            $url = substr($url, 0, strpos($url, '?'));
        }

        if ($method==='get') {
            $fn = $this->_getRoutes[$url] ?? null; 
        } elseif ($method==="post") {
            $fn = $this->_postRoutes[$url] ?? null; 
        }

        if ($fn===null) {
            echo 'page not found'; 
            exit();
        }
        call_user_func($fn, $this);
    }
}