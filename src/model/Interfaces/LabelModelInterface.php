<?php

    interface LabelModelInterface {

        public function setLabel(string $name) : bool;
        public function unsetLabel(int $labelID) : bool;
        public function getLabelByName(string $name) : ?array;
        public function getLabelsByUserSubscriptions(int $userID) : ?array;
    }