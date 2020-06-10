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

                    $location = "..\\images\\profile\\STANDART_IMAGE.png";
                    if (!empty($post["avatar_location"]) && file_exists("..\\images\\profile\\". $post["avatar_location"] .".jpg"))
                        $location = "..\\images\\profile\\". $post["avatar_location"] .".jpg";

                    echo "\t\t<article class='content_post'>\n";
                    echo "\t\t\t<img src='". $location ."' alt='Profile Picture' class='content_post_avatar'>\n";
                    echo "\t\t\t<div class='content_post_title'>";
                    echo "\t\t\t\t<a class='link title' href='User.php?user=". $post["username"] ."'><b>". $post["username"] ."</b></a>";

                    if(isset($post["name"]))
                        echo " in <a class='link' href='label.php?label=". $post["name"] ."'><b>". $post["name"] ."</b></a>\n";
                    else
                        "\n";

                    echo "</div>";
                    echo "\t\t\t<p class='content_post_paragraph'>". $post["content"] ."</p>\n";
                    echo "\t\t\t<a href='Post.php?post=". $post["id_post"] ."'><img src='..\\images\\icons\\expand.png' alt='expand' class='content_post_expand'></a>\n";
                    echo "\t\t</article>\n";
                }
            }
        }
        
        public function outputSinglPost() {

            $location = "..\\images\\profile\\STANDART_IMAGE.png";
            if (!empty($this->posts[0]["avatar_location"]) && file_exists("..\\images\\profile\\". $this->posts[0]["avatar_location"] .".jpg"))
                $location = "..\\images\\profile\\". $this->posts[0]["avatar_location"] .".jpg";

            echo "\t\t<section class='userProfile'>\n";
            echo "\t\t\t<img src='". $location ."' alt='Profile Picture' class='profilePicture userPicture'>\n";
            echo "\t\t\t<p class='userTitle'>". $this->posts[0]["username"] ."</p>\n";
            echo "\t\t</section>\n";
        }

        public function outputSinglePost() {

            $location = "..\\images\\profile\\STANDART_IMAGE.png";
            if (!empty($this->posts[0]["avatar_location"]) && file_exists("..\\images\\profile\\". $this->posts[0]["avatar_location"] .".jpg"))
                $location = "..\\images\\profile\\". $this->posts[0]["avatar_location"] .".jpg";

            echo "\t\t<section class='userProfile'>\n";
            echo "\t\t\t<img src='". $location ."' alt='Profile Picture' class='profilePicture userPicture'>\n";
            echo "\t\t\t<p class='userTitle'>". $this->posts[0]["username"] ."</p>\n";
            echo "\t\t\t<p class='userParagraph'>". $this->posts[0]["content"] ."</p>\n";
            echo "\t\t</section>\n";
        }
    }