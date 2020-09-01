<?php

    const DEVELOP_MODE = true;

    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_NAME = 'test';

    const ABS_PATH = __DIR__;
    const SEP = '/';
    const EXT = '.php';
    
    const INC = ABS_PATH.SEP.'includes'.SEP;
    const CON = ABS_PATH.SEP.'content'.SEP;

    const CORE_PATH = INC.'core'.SEP;
    const MODELS_PATH = INC.'models'.SEP;
    
    function autoloadCoreClass ($class_name) {
        $directorys = array(
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
    spl_autoload_register('autoloadCoreClass');

    function varDump($data = null) {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }