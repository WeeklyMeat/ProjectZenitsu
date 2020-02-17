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
        public function createPost($content, $userID, $labelID) : bool {

            $content = trim(htmlspecialchars($content));

            if (strlen($content) > 0 && strlen($content) <= 255 && is_int($userID) && is_int($labelID))
                return $this->postModel->setPost($content, $userID, $labelID);

            return false;
        }

        public function deletePost($userID, $postID) : bool {

            if (is_int($postID)) {

                $post = $this->postModel->getPostByID($PostID);

                if($post['id_user'] === $userID)
                    return $this->postModel->unsetPost($postID);
            }

            return false;
        }

        public function getPostByID($postID) {

            if(is_int($postID))
                return $this->postModel->getPostByID($postID);
            
            return false;
        }

        public function getNewestPosts($offset, $limit) {

            if(is_int($offset) && is_int($limit))
                return $this->postModel->getNewestPosts($offset, $limit);

            return false;
        }

        public function getPostsByUser($offset, $limit, $userID) {

            if(is_int($offset) && is_int($limit) && is_int($userID))
                return $this->postModel->getPostsByUser($offset, $limit, $userID);

            return false;
        }

        public function getPostsByLabel($offset, $limit, $label) {

            if(is_int($offset) && is_int($limit) && $label = trim(htmlspecialchars($label)))
                return $this->postModel->getPostsByLabel($offset, $limit, $label);

            return false;
        }

        public function getPostsByLabelSubscriptions($offset, $limit, $userID) {

            if(is_int($offset) && is_int($limit) && is_int($userID))
                return $this->postModel->getPostsByLabelSubscriptions($offset, $limit, $userID);

            return false;
        }

        public function getPostsByUserSubscribtions($offset, $limit, $userID) {

            if(is_int($offset) && is_int($limit) && is_int($userID))
                return $this->postModel->getPostsByUserSubscribtions($offset, $limit, $userID);

            return false;
        }
    }