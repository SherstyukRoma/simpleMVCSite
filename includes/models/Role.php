<?php

namespace App {
    class Role extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('roles');
        }
    }
}