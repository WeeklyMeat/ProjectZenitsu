<?php

    class UserContr {

        // Member Functions
        function __construct() {


        }

        function create() {

            // Use Model
        }

        public function login($username, $password) {

            if($this->authenticate($username, $password)) {

                session_start();

                $user = new UserModel();
                $_session["user"] = $user;

                return true;
            }
            else {

                return false;
            }
        }

        protected function authenticate($username, $password) {

            // Use Model
        }

        public function logout() {

            session_start();
            session_unset();
            session_destroy();
        }
    }