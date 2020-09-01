<?php
namespace App {
    class Option extends DBEngine{
        public function __construct()
        {
            parent::__construct('options');
        }
        public function getOption($key){

        }
        public function getAllOptions(){
            return $this->getManyRows([]);
        }
    }
}