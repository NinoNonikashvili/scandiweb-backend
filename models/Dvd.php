<?php
/**
 * Model class for Dvd types.
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
 * Dvd class.
 *
 * PHP Version 8.1.10
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */
class Dvd extends Product
{
    /**
     * Constructor to call parent constructor.
     *
     * @param $data containing information about product
     * 
     * @return void
     */    
    public function __construct($data) 
    { 
        parent::__construct($data);
    }
    /**
     * Setter for descriptionName property
     *
     * @return void
     */
    function setDescriptionName()
    {
        $this->descriptionName = 'size';
    }
    /**
     * Setter for descriptionNumber property
     *
     * @return void
     */
    function setDescriptionNumber()
    {
        $this->descriptionNumber = $this->userData['size'];
    }
    /**
     * Setter for unit property
     *
     * @return void
     */
    function setUnit()
    {
        $this->unit = 'Mb';
    }
}