<?php

    class LabelContr {

        // Member Variables
        protected $labelModel;

        // Constructor
        public function __construct(LabelModelInterface $labelModel) {

            $this->labelModel = $labelModel;
        }

        // Member Functions
        public function createLabel($name) : bool {

            $name = trim(htmlspecialchars($name));

            if (strlen($name) > 0 && strlen($name) <= 127)
                return $this->labelModel->setLabel($name);

            return false;
        }

        public function deleteLabel($labelID) : bool {

            if(is_int($labelID))
                return $this->labelModel->unsetLabel($labelID);

            return false;
        }

        public function getLabelByName($name) {

            $name = trim(htmlspecialchars($name));
            if(!empty($name))
                return $this->labelModel->getLabelByName($name);

            return false;
        }

        public function getLabelsByUserSubscriptions($userID) {

            if(is_int($userID))
                return $this->labelModel->getLabelsByUserSubscriptions($userID);

            return false;
        }
    }