<?php
    const VIEWS_PATH = CON.'views'.SEP;
    const PAGES_PATH = VIEWS_PATH.'pages'.SEP;
    const CONTRL_PATH = CON.'controllers'.SEP;
    
    function autoloadContentClass ($class_name) {
        $directorys = array(
            CONTRL_PATH
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
    spl_autoload_register('autoloadContentClass');