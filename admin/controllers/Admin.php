<?php

namespace App {
    class Admin extends MethodCall
    {
        private $userAuth = null;
        public function __construct()
        {
            $this->userAuth = new UserAutorization();
        }
        public function login() {
            View::render (
                VIEWS_PATH . 'adminview' . EXT, 
                PAGES_PATH . 'login' . EXT, 
                $this->data
            );
        }
        public function index() // route  - /
        {
            if ($this->userAuth->isAuth() == true){
                View::render (
                    VIEWS_PATH . 'adminview' . EXT, 
                    PAGES_PATH . 'main' . EXT, 
                    $this->data
                );
                return;
            } else {
                $this->login();
            }
        }
        public function register() {
            View::render (
                VIEWS_PATH . 'adminview' . EXT, 
                PAGES_PATH . 'register' . EXT, 
                $this->data
            );
        }
        public function forgotpassword(){
            View::render (
                VIEWS_PATH . 'adminview' . EXT, 
                PAGES_PATH . 'forgotpassword' . EXT, 
                $this->data
            );
        }
        public function checkuser() {
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];
                //echo $email."+".$password;
                $password = hash ('sha256', $password);
                //is user valid
                if($this->userAuth->isUserValid($email, $password)) {
                    //session_start();
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['user_id'] = $this->userAuth->getUserInfo()['id'];
                    $this->index();
                    return;
                } else {
                    $this->data['error'] = 'Авторизация неуспешна';
                }
            }
            $this->login();
        }
        public function logout() {
            unset($_SESSION['ip'] );
            unset($_SESSION['user_id'] );
            session_destroy();
            $this->index();
        } 
    }
}
