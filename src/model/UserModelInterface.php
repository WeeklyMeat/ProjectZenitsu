<?php

    interface UserModelInterface {

        public function setUser($username, $email, $password) : bool;
        public function GetUserByUsername($username) : array;
        public function GetUserByEmail($email) : array;
    }