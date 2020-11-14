<?php

namespace Core;

use PDO;

class Database
{
    private static $cnn = null;

    public function getCnn()
    {
        if (is_null(self::$cnn)) {
            self::$cnn = new PDO ("mysql:host=localhost;dbname=school", 'root', '');
        }
    }
}