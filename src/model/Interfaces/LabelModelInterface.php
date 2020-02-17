<?php

    interface LabelModelInterface {

        public function setLabel($name) : bool;
        public function unsetLabel($labelID) : bool;
        public function getLabelByID($labelID) : ?array;
        public function getLabelsByUserSubscriptions($userID) : ?array;
    }