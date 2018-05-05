<?php


namespace app\services;

use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    protected $templater;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(ROOT_DIR . 'views/twig');
        $this->templater = new \Twig_Environment($loader);
    }


    public function render($template, $params = []) : string
    {
        $template .= ".twig";
        return $this->templater->render($template, $params);
    }

}