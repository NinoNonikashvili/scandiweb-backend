<?php
/**
 * File for Builder class.
 *
 * PHP Version 8.1.10
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */

namespace App\models;
/**
 * Product builder class.
 *
 * PHP Version 8.1.10
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */

class ProductBuilder
{
    protected static $product;
    /**
     * Setter for descriptionName property
     * 
     * @param $data data which contains the productType property.
     *              corresponding model object is created.
     *
     * @return object corresponding to the productType.
     */
    public static function selectProduct($data)
    {
        switch($data['productType']) {
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
