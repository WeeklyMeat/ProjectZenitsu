<?php

    interface CommentModelInterface {

        public function setComment(string $content, int $userID, int $labelID) : bool;
        public function unsetComment(int $commentID) : bool;
        public function getCommentsByPost(int $postID) : ?array;
    }