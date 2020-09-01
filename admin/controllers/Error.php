<?php

namespace App {
    class Error extends MethodCall
    {
        public function __construct()
        {

        }
        public function index()
        {
            View::render(VIEWS_PATH . 'adminview' . EXT, PAGES_PATH . 'error' . EXT, $this->data);
        }
    }
}
