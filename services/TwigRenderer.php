<?php


namespace app\services;
use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{


    public function render($template, $params = [])
    {
        $loader = new Twig_Loader_Filesystem(ROOT_DIR . "views/catalog.php");
        $twig = new Twig_Environment($loader, array(
            'cache' => false,
            'debug' => false,
            'auto_reload' => true
        ));
        $template = $twig->loadTemplate('catalog');
        // передаём в шаблон переменные и значения
        // выводим сформированное содержание
        echo $template->render(array(
            'name' => 'Clark Kent',
            'username' => 'ckent',
        ));

    }

}