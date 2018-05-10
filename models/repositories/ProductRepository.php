<?php


namespace app\models\repositories;
use app\models\Repository;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return "products";
    }

    public function getEntityClass()
    {
        return \app\models\entities\Product::class;
    }

    public function getByCategory($categoryId){

    }
}