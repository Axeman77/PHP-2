<?php
namespace app\models;


class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $customer;

    public function getTableName()
    {
        return "products";
    }
    public function getOne($id){
        return "products";
    }
    public function getAll(){

    }
    public function __construct()
    {
//        $this->db = $db;
    }

}
