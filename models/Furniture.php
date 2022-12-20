<?php
/**
 * Model class for furniture types.
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
 * Furniture class.
 *
 * PHP Version 8.1.10
 *
 * @category Scandiweb-Backend-PHP
 * @package  Scandiweb-Backend-PHP
 * @author   Nino Nonikashvili <nonikashvilinino8799@gmail.com>
 * @license  no license
 * @link     https://ninononikashvili.github.io/scandiweb-frontend
 */

class Furniture extends Product
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
        $this->descriptionName = 'dimensions';
    }
    /**
     * Setter for descriptionNumber property
     *
     * @return void
     */
    function setDescriptionNumber()
    {   
        $height = $this->userData['height'];
        $width = $this->userData['width'];
        $length = $this->userData['length'];
        $this->descriptionNumber = $height.'x'.$width.'x'.$length;
    }
    /**
     * Setter for unit property
     *
     * @return void
     */
    function setUnit()
    {
        $this->unit = 'Cm';
    }
}