<?php

    class CommentView {

        // Member Variables
        protected $comments;

        // Constructor
        public function __construct($comments) {

            $this->comments = $comments;
        }

        // Member Functions
        public function outputComments() {

            foreach ($this->comments as $comment) {

                if(!$comment["is_deleted"]) {

                    $location = "..\\images\\profile\\STANDART_IMAGE.png";
                    if (!empty($comment["avatar_location"]) && file_exists("..\\images\\profile\\". $comment["avatar_location"] .".jpg"))
                        $location = "..\\images\\profile\\". $comment["avatar_location"] .".jpg";

                    echo "\t\t<article class='content_post'>\n";
                    echo "\t\t\t<img src='". $location ."' alt='Profile Picture' class='content_post_avatar'>\n";
                    echo "\t\t\t<div class='content_post_title'>";
                    echo "\t\t\t\t<a class='link title' href='User.php?user=". $comment["username"] ."'><b>". $comment["username"] ."</b></a>\n";
                    echo "</div>";
                    echo "\t\t\t<p class='content_post_paragraph'>". $comment["content"] ."</p>\n";
                    echo "\t\t</article>\n";
                }
            }
        }
    }