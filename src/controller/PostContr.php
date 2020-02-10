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

        public function getPostByID($postID) {

            if(is_int($postID)) {

                return $this->postModel->getPostByID($postID);
            }
            else {

                return false;
            }
        }

        public function getMultiplePosts($offset, $limit) {

            if(is_int($offset)) {

                return $this->postModel->getMultiplePosts($offset, $limit);
            }
            else {

                return false;
            }
        }
    }