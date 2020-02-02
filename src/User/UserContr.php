<?php
    require_once "UserModel.php";

    class UserContr extends UserModel {

        // Member Functions
        public function createUser($username, $email, $password) {

            if($this->doesExist($username, "username") || $this->doesExist($email, "email")) {
                return false;
            }
            return $this->setUser($username, $email, $password);
        }

        public function login($username, $password) {

            if($this->authenticate($username, $password)) {

                session_start();
                session_regenerate_id();
                $_session["user"] = $username;
                
                return true;
            }
            else {

                return false;
            }
        }

        protected function authenticate($username, $password) {

            if(!$this->doesExist($username, "username")) {
                return false;
            }

            $user = $this->getUser($username);
            return password_verify($password, $user['password']);
        }

        public function logout() {

            session_start();
            session_unset();
            session_destroy();
        }
    }