<?php
use \app\models\Product;
use \app\models\Model;


include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

/*function foo(IModel $model){
    $model->getOne(1);
}*/

$product = new Product();
var_dump( $product );