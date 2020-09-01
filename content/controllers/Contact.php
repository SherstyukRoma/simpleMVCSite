<?php

namespace App {
    class Contact extends MethodCall
    {
        public function __construct()
        {
            $this->format_options();
            $this->format_navigate();
        }
        public function index() // route  - /
        {
            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'contacts' . EXT,
                $this->data
            );
        }    
        public function callus()
        {
            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'callus' . EXT,
                $this->data
            );        
        }
        public function sendmessage()
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $message = $_POST['message'];
            //валидация - проверка полученных данных 
            $cm = new ClientMessage();
            if ($cm->addRow([
                'name'=>$name,
                'email'=>$email,
                'title'=>$title,
                'message'=>$message
            ]) == true) {
                $this->data['succsess'] = 'Сообщение успешно отправлено';
            } else {
                $this->data['error'] = 'Неудача, попробуйте позже';
            }
            unset($cm);
            $this->callus();
        }
    }
}
