<?php
namespace app\models;


class Product extends DataEntity///extends DataEntity
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $model;
    public $path;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     * @param $customer
     */
   /* public function __construct($name = null, $description = null, $price = null, $path = null, $model=null)
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->model = $model;
        $this->path = $path;
    }

    public static function getTableName()
    {
        return "products";
    }*/

}