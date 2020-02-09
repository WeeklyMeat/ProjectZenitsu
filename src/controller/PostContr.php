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

        public function deletePost($UserID, $PostID) : bool {

            $Post = $this->postModel->getPostByID($PostID);

            if($Post['id_user'] === $UserID) {

                return $this->postModel->unsetPost($PostID);
            }
            else {

                return false;
            }
        }

        public function getPostByID($ID) {

            if(is_int($ID)) {

                return $this->postModel->getPostByID();
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