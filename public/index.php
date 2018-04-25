<?php
use \app\models\Product;
use \app\models\Model;

include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$product = new Product();
var_dump($product->getAll());


