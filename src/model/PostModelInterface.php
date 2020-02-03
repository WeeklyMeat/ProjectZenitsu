<?php

    interface PostModelInterface {

        public function setPost($content, $userFK, $labelFK);
        public function getPostByID();
        public function getMultiplePosts($limit);
        public function getMultiplePostsByLabel($limit, $labelID);
    }