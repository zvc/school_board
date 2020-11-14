<?php

namespace Core;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Controller
{
    public $vars = [];

    public function set($data)
    {
        $this->vars = array_merge($this->vars, $data);
    }

    public function render($tpl)
    {
        $tplPath = ROOT . 'Views/' . ucfirst(substr(str_replace('Controller', '', get_class($this)),2)) . '/';
        $loader = new FilesystemLoader($tplPath);
        $twig = new Environment($loader);
        $template = $tpl . '.twig';
        echo $twig->render($template, $this->vars);
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data();
    }

    protected function secure_form($form)
    {
        foreach($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }
}