<?php
    require_once "model\\CommentModel.php";
    require_once "model\\CommentModelInterface.php";

    class CommentContr {

        // Member Variables
        protected $commentModel;

        // Constructor
        public function __construct(CommentModelInterface $commentModel) {

            $this->commentModel = $commentModel;
        }
        
        // Member Functions
        public function createComment($content, $userID, $labelID) : bool {

            return $this->commentModel->setComment($content, $userID, $labelID);
        }

        public function deleteComment($commentID) : bool {

            return $this->commentModel->unsetComment($commentID);
        }

        public function getMultipleCommentsByPost($postID) : ?array {

            return $this->commentModel->getMultipleCommentsByPost($postID);
        }
    }