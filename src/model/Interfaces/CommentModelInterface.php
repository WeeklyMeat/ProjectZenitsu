<?php

    interface CommentModelInterface {

        public function setComment($content, $userID, $labelID) : bool;
        public function unsetComment($ID) : bool;
        public function getMultipleCommentsByPost($postID) : ?array;
    }