<?php
    require_once "model\\PostModel.php";
    require_once "model\\PostModelInterface.php";

    class PostContr {

        // Member Variables
        protected $postModel;

        // Constructor
        public function __construct(PostModelInterface $postModel) {

            $this->postModel = $postModel;
        }

        public function createPost($content, $userFK, $labelFK) {

            return $this->postModel->setPost($content, $userFK, $labelFK);
        }
    }