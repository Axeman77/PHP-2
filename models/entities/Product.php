<?php
namespace app\models\entities;

class Product extends DataEntity//extends DataEntity
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $customer;

    public function getShortDescription()
    {
        return  mb_substr($this->description, 50);
    }

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $customer
     */
    public function __construct($name = null, $description = null, $price = null, $customer = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->customer = $customer;
    }
}