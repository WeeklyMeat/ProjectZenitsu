<?php
    include "Autoloader.php";

    class UserLikesPostContr implements LikeInterface {

        // Member Variables
        protected $ulpModel;

        // Constructor
        public function __construct(UserLikesPostModelInterface $userLikesPostModel) {

            $this->ulpModel = $userLikesPostModel;
        }

        // Member Functions
        public function doLike($userID, $contentID) : bool {

            if(is_int($userID) && is_int($contentID) && !$this->doesLikeExist($userID, $contentID)) {

                return $this->ulpModel->setLike($userID, $contentID);
            }

            return false;
        }

        public function undoLike($userID, $contentID) : bool {

            if(is_int($userID) && is_int($contentID) && $this->doesLikeExist($userID, $contentID)) {

                return $this->ulpModel->unsetLike($userID, $contentID);
            }

            return false;
        }

        public function doesLikeExist($userID, $contentID) : bool {

            if(!empty($this->ulpModel->getLike($userID, $contentID))) {

                return true;
            }

            return false;
        }
    }