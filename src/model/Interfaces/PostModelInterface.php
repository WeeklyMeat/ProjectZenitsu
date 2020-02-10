<?php

    interface PostModelInterface {

        public function setPost($content, $userID, $labelID) : bool;
        public function unsetPost($postID) : bool;

        public function getPostByID($postID) : ?array;
        public function getMultiplePosts($offset, $limit) : ?array;
        public function getMultiplePostsByUser($offset, $limit, $userID) : ?array;
        public function getMultiplePostsByLabel($offset, $limit, $labelID) : ?array;
    }