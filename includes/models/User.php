<?php

namespace App {
    class User extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('users');
        }
    }
}