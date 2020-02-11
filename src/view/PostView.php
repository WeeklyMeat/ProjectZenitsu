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

                echo "<div class = 'post'>". $post['content'] ."</div>";
            }
        }
    }