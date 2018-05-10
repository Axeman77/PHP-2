<?php
namespace app\models;


use app\models\enteties\Product;
use app\services\Sessions;

class Basket extends Model
{
    public function addCart(Product $entity)
    {
        (new Sessions())->set('basket', $entity->id);
    }
}