<?php

    interface FollowModelInterface {

        public function setFollow(int $userID, int $contentID) : bool;
        public function unsetFollow(int $userID, int $contentID) : bool;
        public function getFollow(int $userID, int $contentID) : ?array;
    }