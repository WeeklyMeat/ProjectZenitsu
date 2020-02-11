<?php

    interface LikeModelInterface {

        public function setLike(int $userID, int $contentID) : bool;
        public function unsetLike(int $userID, int $contentID) : bool;
        public function getLike(int $userID, int $contentID) : ?array;
    }