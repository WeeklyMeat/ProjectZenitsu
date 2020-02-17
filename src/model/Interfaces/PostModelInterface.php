<?php

    interface PostModelInterface {

        public function setPost(string $content, int $userID, int $labelID) : bool;
        public function unsetPost(int $postID) : bool;

        public function getPostByID(int $postID) : ?array;
        public function getNewestPosts(int $offset, int $limit) : ?array;
        public function getPostsByUser(int $offset, int $limit, int $userID) : ?array;
        public function getPostsByLabel(int $offset, int $limit, string $label) : ?array;
        public function getPostsByLabelSubscriptions(int $offset, int $limit, int $userID) : ?array;
        public function getPostsByUserSubscribtions(int $offset, int $limit, int $userID) : ?array;
    }