<?php
    require "Autoloader.php";

    class LikeContr {

        // Member Variables
        protected $likeModel;

        // Constructor
        public function __construct(LikeModelInterface $likeModel) {

            $this->likeModel = $likeModel;
        }

        // Member Functions
        public function doLike($userID, $contentID) : bool {

            if(is_int($userID) && is_int($contentID) && !$this->doesLike($userID, $contentID)) {

                return $this->likeModel->setLike($userID, $contentID);
            }

            return false;
        }

        public function undoLike($userID, $contentID) : bool {

            if(is_int($userID) && is_int($contentID) && $this->doesLike($userID, $contentID)) {

                return $this->likeModel->unsetLike($userID, $contentID);
            }

            return false;
        }

        public function doesLike($userID, $contentID) : bool {

            if(!empty($this->likeModel->getLike($userID, $contentID))) {

                return true;
            }

            return false;
        }
    }