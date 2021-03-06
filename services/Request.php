<?php

namespace app\services;

class BadRequestException extends \Exception{
    protected $message = "Invalid Request";
    protected $code = 404;
}

class Request
{
    private $requestString;
    private $controllerName;
    private $actionName;
    private $params;
    private $method;

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    private function parseRequest()
    {
        $pattern = "#(?P<controller>[a-z]+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        $this->method = $_SERVER['REQUEST_METHOD'];
        if (preg_match_all($pattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        } else {
            throw new BadRequestException();
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getMethod()
    {
        return $this->method;
    }

}