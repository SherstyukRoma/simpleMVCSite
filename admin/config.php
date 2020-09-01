<?php

    const DEVELOP_MODE = true;

    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'test';

    const ABS_PATH = __DIR__;
    const SEP = '/';
    const EXT = '.php';
    const CORE_PATH = ABS_PATH.SEP.'core'.SEP;

    const VIEWS_PATH = ABS_PATH.SEP.'views'.SEP;
    const PAGES_PATH = VIEWS_PATH.'pages'.SEP;
    const CONTRL_PATH = ABS_PATH.SEP.'controllers'.SEP;
    const MODELS_PATH = ABS_PATH.SEP.'models'.SEP;
    
    function autoloadClass ($class_name) {
        $directorys = array(
            CONTRL_PATH,
            CORE_PATH,
            MODELS_PATH
        );
        foreach($directorys as $directory)
        {
            $parts = explode('\\', $class_name);
            //var_dump($parts);
            if(file_exists($directory.end($parts) . EXT))
            {
                require_once($directory.end($parts) . EXT);
                return;
            }           
        }
    }
    spl_autoload_register('autoloadClass');

    function varDump($data = null) {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }