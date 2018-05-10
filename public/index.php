<?php
define("DS", DIRECTORY_SEPARATOR);

include __DIR__ . "/../services/Autoloader.php";
include __DIR__ . "/../vendor/autoload.php";
spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$config = include __DIR__. "/../config/main.php";
\app\base\App::call()->run($config);


/*
try {
    $request = new \app\services\Request();
}catch (\app\services\BadRequestException $e) {
    var_dump($e);
}catch (Exception $e){

}
$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $controller = new $controllerClass(new \app\services\TemplateRenderer());
    //$controller = new $controllerClass(new \app\services\TwigRenderer());
    $controller->runAction($actionName);
}*/