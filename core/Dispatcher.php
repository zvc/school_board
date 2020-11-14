<?php

namespace Core;

class Dispatcher
{
    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controllerName = "\\Controllers\\" . ucfirst($this->request->controller) . "Controller";
        $controller = new $controllerName();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }
}