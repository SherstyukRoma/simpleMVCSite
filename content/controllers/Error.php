<?php

namespace App {
    class Error extends MethodCall
    {
        public function __construct()
        {
            $this->format_options();
            $this->format_navigate();
        }
        public function index()
        {
            View::render(VIEWS_PATH . 'templateView' . EXT, PAGES_PATH . 'error' . EXT, $this->data);
        }
    }
}
