<?php
namespace app\services;

use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
    public function render($template, $params = []) : string
    {
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}