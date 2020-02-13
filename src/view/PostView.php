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

                    echo "<div class = 'post'>";
                    echo "<p class='post_paragraph'>". $post["content"] ."</p>";
                    echo "<a href='Post.php?post=". $post["id_post"] ."'>To the post</a>";
                    echo "</div>";
                }
            }
        }    
    }