<?php
/**
 * Model class for general product types.
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
 * Product class.
 *
 * PHP Version 8.1.10
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */
abstract class Product
{
    protected $userData;
    protected $name;
    protected $sku;
    protected $price;
    protected $descriptionName;
    protected $descriptionNumber;
    protected $unit;

    /**
     * Constructor to initialize name, sku and price properties
     *
     * @param $data containing information about product
     * 
     * @return void
     */
    public function __construct($data)
    {
        $this->userData = $data;
        $this->name = $data['name'];
        $this->sku = $data['SKU'];
        $this->price = $data['price'];
    }
    /**
     * Getter for name property
     *
     * @return value of name
     */
    function getName()
    {
        return $this->name;
    }
    /**
     * Getter for sku property
     *
     * @return value of sku
     */
    function getSku()
    {
        return $this->sku;
    }
    /**
     * Getter for price property
     *
     * @return value of price
     */
    function getPrice()
    {
        return $this->price;
    }
    /**
     * Getter for descriptionName property
     *
     * @return value of name
     */
    function getDescName()
    {
        return $this->descriptionName;
    }
    /**
     * Getter for descriptionNumber property
     *
     * @return value of descriptionNumber
     */
    function getDescNumber()
    {
        return $this->descriptionNumber;
    }
    /**
     * Getter for unit property
     *
     * @return value of unit
     */
    function getUnit()
    {
        return $this->unit;
    }
    /**
     * Abstract function to set descriptionName.
     * Depends on the type of the product.
     *
     * @return void
     */
    abstract function setDescriptionName();
    /**
     * Abstract function to set descriptionNumber.
     * Depends on the type of the product.
     *
     * @return void
     */
    abstract function setDescriptionNumber();
    /**
     * Abstract function to set unit.
     * Depends on the type of the product.
     *
     * @return void
     */
    abstract function setUnit();
}
