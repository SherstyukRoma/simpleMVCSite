<?php

namespace App {
    class UserAutorization
    {
        private $currentUser = null;
        public function isAuth() {
            return isset($_SESSION['ip']);
        }
        public function isUserValid($email, $password) {
            $user = new User();
            $query = "SELECT users.id, users.email, users.password, roles.role 
            FROM users, roles 
                WHERE users.role_id = roles.id AND
                       users.email = '$email' AND
                       users.password = '$password'";
            $result = $user->executeQuery($query);
            if(count($result) == 0) {
                return false;
            } else if(count($result) == 1){
                $this->currentUser = $result[0];
                return true;
            }
        }
        public function getUserInfo() {
            return $this->currentUser == null ? null:$this->currentUser;
        }
    }
}