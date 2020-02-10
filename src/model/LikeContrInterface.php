<?php

    interface LikeContrInterface {

        public function doLike($userID, $contentID) : bool;
        public function undoLike($userID, $contentID) : bool;
        public function doesLikeExist($userID, $contentID) : bool;
    }