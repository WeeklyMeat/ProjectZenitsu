<?php

    interface LabelModelInterface {

        public function setLabel(string $name) : bool;
        public function unsetLabel(int $labelID) : bool;
        public function getLabelsByUserSubscriptions(int $userID) : ?array;
    }