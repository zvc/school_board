<?php

namespace Core;

class Router
{
    public static function parse($url, $request)
    {
        $url = trim($url);

        if ($url == 'school_board') {
            $request->controller = 'students';
            $request->action = 'index';
            $request->params = [];
        } else {
            $explodedUrl = explode('/', $url);
            $explodedUrl = array_slice($explodedUrl, 2);

            $request->controller = $explodedUrl[0];
            $request->action = $explodedUrl[1];
            $request->params = array_slice($explodedUrl, 2);
        }
    }
}