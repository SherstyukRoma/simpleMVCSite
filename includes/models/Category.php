<?php

namespace App {
    class Category extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('categories');
        }
    }
}