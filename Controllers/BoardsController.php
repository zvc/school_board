<?php

namespace Controllers;

use Core\Controller;

class BoardsController extends Controller
{
    public function index()
    {
        $this->render('index');
    }
}