<?php

    interface UserModelInterface {

        public function setUser($username, $email, $password) : bool;

        public function getUserByUsername($username);
        public function getUserByEmail($email);
    }