<?php
use \app\models\Product;
use \app\models\Model;

include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$db = new \app\services\Db();

$res = $db->queryAll("SELECT * FROM products");
var_dump($res);


