<?php
    require "Autoloader.php";

    class PostView {

        // Member Variables
        protected $posts;

        // Constructor
        public function __construct($posts) {

            $this->posts = $posts;
        }

        // Member Functions
        public function outputPosts() {

            foreach ($this->posts as $post) {

                if(!$post["is_deleted"]) {

                    echo "\t\t<article class = 'post'>\n";
                    echo "\t\t\t<p class='post_paragraph'>". $post["content"] ."</p>\n";
                    echo "\t\t\t<a class='link' href='Post.php?post=". $post["id_post"] ."'>To the post</a>\n";
                    echo "\t\t</article>\n";
                }
            }
        }    
    }