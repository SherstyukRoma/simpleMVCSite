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
        protected function format_options() {
            $options = new Option();
            $this->data['options'] = [];
            foreach ($options->getAllOptions() as $key => $value) {
                $this->data['options'][$value['option_name']] = $value['option_value'];
            }
            unset($options);
        }
        protected function format_navigate() {
            $nav = new NavBar();
            $this->data['navigate'] = $nav->getParentsElements();
            for($i = 0; $i < count($this->data['navigate']); $i++){
                $this->data['navigate'][$i]['childs'] = 
                    $nav->getChilds($this->data['navigate'][$i]['id']);
            }
            unset($nav);
        }
    }
}
