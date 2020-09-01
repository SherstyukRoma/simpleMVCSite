<?php

namespace App {
    class MethodCall extends MethodExecuter
    {
        protected $data = [];
        public function call($method)
        {
            if (method_exists($this, $method)) {
                $this->$method();
            }
        }
        public function index()
        {
        }
    }
}
