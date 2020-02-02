<?php

    class UserModel {

        // Member Variables
        protected $username;
        protected $email;

        protected $biography;

        // Member Functions

        public function getUser($username) {

            
        }

            // Getter & Setter
            public function getUsername() {
                return $this->username;
            }

            public function setEmail($email) {
                $this->email = $email;
            }

            public function setBiography($biography) {
                $this->biography = $biography;
            }

        // Constructor
        function __construct($username) {
            
            $this->username = $username;
        }
    }