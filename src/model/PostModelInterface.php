<?php

    interface PostModelInterface {

        public function setPost();
        public function getPostByID();
        public function getPostByLabel();
        public function getAllPost();
    }