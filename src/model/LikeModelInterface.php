<?php

    interface LikeModelInterface {

        public function setLike($userID, $contentID) : bool;
        public function unsetLike($userID, $contentID) : bool;
        public function getLike($userID, $contentID) : ?array;
    }