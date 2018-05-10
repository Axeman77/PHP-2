<?php

namespace app\services;

class Autoloader
{
    private $fileExtension = ".php";

    public function loadClass($className)
    {
        $className = str_replace(["app\\", "\\"], [__DIR__ . "/../", DS], $className);
        $className .= $this->fileExtension;
        if (file_exists($className)) {
            include $className;
        }
    }
}