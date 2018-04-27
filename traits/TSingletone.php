<?php

namespace app\traits;


trait TSingletone
{
    private static $instance;

    private function __construct() {}
    private function __clone(){}
    private function __wakeup(){}

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}