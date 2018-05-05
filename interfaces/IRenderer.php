<?php


namespace app\interfaces;


interface IRenderer
{
    public function render($template, $params = []) : string;
}