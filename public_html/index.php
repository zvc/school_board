<?php

use \Core\Dispatcher;

define('WEBROOT', str_replace('public_html/index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('public_html/index.php', '', $_SERVER['SCRIPT_FILENAME']));

$dispatch = new Dispatcher();
$dispatch->dispatch();