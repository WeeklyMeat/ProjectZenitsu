<?php
    require "Autoloader.php";

    class PostContr {

        // Member Variables
        protected $postModel;

        // Constructor
        public function __construct(PostModelInterface $postModel) {

            $this->postModel = $postModel;
        }

        // Member Functions
        public function createPost($content, $userFK, $labelFK) : bool {

            return $this->postModel->setPost($content, $userFK, $labelFK);
        }

        public function deletePost($userID, $postID) : bool {

            $post = $this->postModel->getPostByID($PostID);

            if($post['id_user'] === $userID) {

                return $this->postModel->unsetPost($postID);
            }
            else {

                return false;
            }
        }

        public function getPostByID($postID) : ?array {

            return $this->postModel->getPostByID($postID);
        }

        public function getMultiplePosts($offset, $limit) : ?array {

            return $this->postModel->getMultiplePosts($offset, $limit);
        }

        public function getMultiplePostsByUser($offset, $limit, $userID) : ?array {

            return $this->postModel->getMultiplePostsByUser($offset, $limit, $userID);
        }

        public function getMultiplePostsByLabel($offset, $limit, $labelID) : ?array {

            return getMultiplePostsByLabel($offset, $limit, $labelID);
        }
    }