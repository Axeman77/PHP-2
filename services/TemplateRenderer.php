<?php
namespace app\services;

use app\base\App;
use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
    public function render($template, $params = []) : string
    {
        ob_start();
        extract($params);
        $templatePath = App::call()->config['templates_dir'] . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}