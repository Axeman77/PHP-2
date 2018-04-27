<?php
namespace app\models;


class Product extends DbModel///extends DbModel
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $customer;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $customer
     */
    public function __construct($id = null, $name = null, $description = null, $price = null, $customer = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->customer = $customer;
    }

    public static function getTableName()
    {
        return "products";
    }

}