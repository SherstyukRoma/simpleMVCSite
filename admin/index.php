<?php
    session_start();

use App\DBConnector;
use App\DBEngine;
use App\Kernel;

require_once('config.php');

if (DEVELOP_MODE == true) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

try {
    Kernel::init();
} catch (Exception $e) {
    //логирование ошибок, обязательно
}
