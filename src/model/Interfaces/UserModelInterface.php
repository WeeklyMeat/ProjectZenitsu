<?php

    interface UserModelInterface {

        public function setUser(string $username, string $email, string $password) : bool;

        public function getUserByUsername(string $username);
        public function getUserByEmail(string $email);
    }