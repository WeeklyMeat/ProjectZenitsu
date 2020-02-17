<?php
    require "Autoloader.php";

    class CommentContr {

        // Member Variables
        protected $commentModel;

        // Constructor
        public function __construct(CommentModelInterface $commentModel) {

            $this->commentModel = $commentModel;
        }
        
        // Member Functions
        public function createComment($content, $userID, $postID) : bool {

            $content = trim(htmlspecialchars($content));

            if (strlen($content) > 0 && strlen($content) <= 255 && is_int($userID) && is_int($postID))
                return $this->commentModel->setComment($content, $userID, $postID);
            
            return false;
        }

        public function deleteComment($userID, $commentID) : bool {

            if (is_int($commentID)) {

                $comment = $this->commentModel->getCommentByID($commentID);

                if($comment['id_user'] === $userID)
                    return $this->commentModel->unsetPost($commentID);
            }

            return false;
        }

        public function getCommentsByPost($postID) : ?array {

            if(is_int($postID)) {

                return $this->commentModel->getCommentsByPost($postID);
            }

            return false;
        }
    }