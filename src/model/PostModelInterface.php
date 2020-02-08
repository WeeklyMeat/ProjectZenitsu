<?php

    interface PostModelInterface {

        public function setPost($content, $userFK, $labelFK);
        public function getPostByID();
        public function getMultiplePosts($offset, $limit);
        public function getMultiplePostsByLabel($offset, $limit, $labelID);
    }