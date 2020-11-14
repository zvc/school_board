<?php

namespace Core;

class Controller
{
    public $vars = [];

    public function set($data)
    {
        $this->vars = array_merge($this->vars, $data);
    }

    public function render($tpl)
    {
        echo 'test';
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