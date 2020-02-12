<?php
    require "Autoloader.php";

    class FollowContr {

        // Member Variables
        protected $followModel;

        // Constructor
        public function __construct(FollowModelInterface $followModel) {

            $this->followModel = $followModel;
        }
        
        // Member Functions
        public function doFollow($userID, $contentID) : bool {

            if(is_int($userID) && is_int($contentID) && !$this->doesFollow($userID, $contentID))
                return $this->followModel->setFollow($userID, $contentID);

            return false;
        }

        public function undoFollow($userID, $contentID) : bool {

            if(is_int($userID) && is_int($contentID) && $this->doesFollow($userID, $contentID))
                return $this->followModel->unsetFollow($userID, $contentID);

            return false;
        }

        public function doesFollow($userID, $contentID) : bool {

            if(is_int($userID) && is_int($contentID) && !empty($this->followModel->getFollow($userID, $contentID)))
                return true;

            return false;
        }
    }