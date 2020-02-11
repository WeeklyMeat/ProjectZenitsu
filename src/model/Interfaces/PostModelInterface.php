<?php

    interface PostModelInterface {

        public function setPost(string $content, int $userID, int $labelID) : bool;
        public function unsetPost(int $postID) : bool;

        public function getPostByID(int $postID) : ?array;
        public function getMultiplePosts(int $offset, int $limit) : ?array;
        public function getMultiplePostsByUser(int $offset, int $limit, int $userID) : ?array;
        public function getMultiplePostsByLabel(int $offset, int $limit, int $labelID) : ?array;
    }