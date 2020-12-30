<?php

namespace Services;

require_once '../controller/RealEstate.php';
require_once '../vendor/autoload.php';
require_once 'dev.php';

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {
        $class = str_replace('App', '', $class);
        $class = str_replace('\\', '/', $class);
        require '../' . $class . '.php';
    }
}
