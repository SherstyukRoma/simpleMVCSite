<?php

namespace App {
    class UserCard extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('usercards');
        }
    }
}