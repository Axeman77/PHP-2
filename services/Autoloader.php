<?php

namespace app\services;

class Autoloader
{
    public function loadClass($className)
    {
        // convert namespace to full file path
        $className = str_replace('\\', '/', $className);
        $filename = str_replace('app', '', $className . '.php');
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path = str_replace('public', '', $path);
        $filename = $path . "{$filename}";
        if (file_exists($filename)) {
            include $filename;

        }
        var_dump($filename);

    }


}