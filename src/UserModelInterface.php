<?php

    interface UserModelInterface {

        public function setUser($username, $email, $password);
        public function GetUserByUsername($username);
        public function GetUserByEmail($email);
    }