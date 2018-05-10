<?php

namespace app\base;

use app\services\Db;
use app\services\Request;
use app\traits\TSingletone;

/**
 * Class App
 * @package app\base
 * @property Request $request
 * @property Db $db
 */
class App
{
    use TSingletone;

    public $config;

    /** @var  Storage */
    private $components;

    private $controller;
    private $action;

    /**
     * @return static
     */
    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    public function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'product';
        $this->action = $this->request->getActionName();

        $controllerClass = $this->config['controllers_namespaces'] . ucfirst($this->controller) . "Controller";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new \app\services\TemplateRenderer());
            $controller->runAction($this->action);
        }
    }

    function __get($name)
    {
        return $this->components->get($name);
    }


}