<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/Autoloader.php";
include VENDOR_DIR . "autoload.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);
$request = new \app\services\Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    /** @var  $controller */
    $controller = new $controllerClass(new \app\services\TemplateRenderer());
    //$controller = new $controllerClass(new \app\services\TwigRenderer());
    $controller->runAction($actionName);
}