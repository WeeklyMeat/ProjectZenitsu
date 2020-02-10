<?php

    interface FollowModelInterface {

        public function setFollow($userID, $contentID) : bool;
        public function unsetFollow($userID, $contentID) : bool;
        public function getFollow($userID, $contentID) : ?array;
    }