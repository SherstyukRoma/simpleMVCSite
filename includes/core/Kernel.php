<?php

namespace App {

    class Kernel
    {
        public static $router;
        public static function init($cfg_path){
            require_once($cfg_path.SEP.'config'.EXT);
            self::$router = new Router();
            self::$router->start();
        }
    }
}
