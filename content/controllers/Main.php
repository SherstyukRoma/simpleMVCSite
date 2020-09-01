<?php

namespace App {
    class Main extends MethodCall
    {
       
        public function __construct()
        {
            $this->format_options();
            $this->format_navigate();
        }
        
        public function index() // route  - /
        {
            View::render (
                VIEWS_PATH . 'templateView' . EXT, 
                PAGES_PATH . 'main' . EXT, 
                $this->data
            );
        }
    }
}
