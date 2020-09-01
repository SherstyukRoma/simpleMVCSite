<?php

//example.com/main/index
//example.com/main/index2?key=value
//example.com/main2/
//example.com/main/
//example.com/post/
//example.com/

namespace App {
    class Router
    {
        private $defaultControllerName = __NAMESPACE__ . "\\" . 'Admin';
        private $errorControllerName = __NAMESPACE__ . "\\" . 'Error';
        private $defaultActionName = 'index';

        private $controllerName = null;
        private $actionName = null;

        public $controller = null;
        public function start()
        {
            
            $routes = explode('?', $_SERVER['REQUEST_URI'])[0];
            
            $routes = explode('/', $_SERVER['REQUEST_URI']);
            //varDump($routes[2]);
            //var_dump($routes);

            //controller-------------------------------------------------------start
            if (empty($routes[1])) { //доступ в корень
                $this->controllerName = $this->defaultControllerName;
            } else {
                $this->controllerName = ucfirst(mb_strtolower($routes[1]));
                //echo "Контроллер:" . $this->controllerName . "<br>";
                if (file_exists(CONTRL_PATH . $this->controllerName . EXT)) {
                    //echo "файл класса существует<br>";
                    $this->controllerName = __NAMESPACE__ . "\\" . $this->controllerName;
                } else {
                    //echo "файл класса НЕ существует, перенарпавяем на ERROR<br>";
                    $this->controllerName = $this->errorControllerName;
                }
            }
            //создаем экземпляр класса отв за текущий маршрут
            $this->controller = new $this->controllerName();
            //controller-------------------------------------------------------end
            //action-------------------------------------------------------start
            $this->actionName = $this->defaultActionName;
            //echo $routes[2];
            if (!empty($routes[2])) {
                if (method_exists($this->controller, $routes[2])) {
                    //echo "action существует, можем вызывать<br>";
                    $this->actionName = mb_strtolower($routes[2]);
                }
            }
            // $this->actionName = preg_replace('~^\s+~u', '', $this->actionName); // == ltrim
            // $this->actionName = preg_replace('~\s+$~u', '', $this->actionName); // == rtrim
            // $this->actionName  =preg_replace('~^\s+|\s+$~us', '', $this->actionName); // == trim
            //echo $this->actionName;
            $this->controller->call($this->actionName);
            //action-------------------------------------------------------end
        }
    }
}
