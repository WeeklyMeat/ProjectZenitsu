<?php

    interface UserModelInterface {

        public function setUser($username, $email, $password) : bool;

        public function getUserByUsername($username);
        public function getUserByEmail($email);

        public function followUser($userFollowing, $userToBeFollowed) : bool;
        public function followLabel($userID, $labelID) : bool;
    }