<?php

namespace Core;

use PDO;

class Database
{
    private static $bdd = null;

    public function getBdd()
    {
        if (is_null(self::$bdd)) {
            self::$bdd = new PDO ("mysql:host=localhost;dbname=school", 'root', '');
        }

        return self::$bdd;
    }
}