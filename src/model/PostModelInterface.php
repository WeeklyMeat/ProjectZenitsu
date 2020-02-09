<?php

    interface PostModelInterface {

        public function setPost($content, $userFK, $labelFK) : bool;
        public function unsetPost($ID) : bool;

        public function getPostByID($ID) : ?array;
        public function getMultiplePosts($offset, $limit) : ?array;
        public function getMultiplePostsByUser($offset, $limit, $userID) : ?array;
        public function getMultiplePostsByLabel($offset, $limit, $labelID) : ?array;
    }