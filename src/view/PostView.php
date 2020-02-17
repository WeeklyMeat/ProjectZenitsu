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

                    echo "\t\t<article class='post'>\n";
                    echo "\t\t\t<img src='". $location ."' alt='Profile Picture' class='profilePicture'>\n";
                    echo "\t\t\t<a class='link title' href='User.php?user=". $post["username"] ."'><b>". $post["username"] ."</b></a>";

                    if(isset($post["name"]))
                        echo " in <a class='link' href='Index.php?mode=label&label=". $post["name"] ."'><b>". $post["name"] ."</b></a>\n";
                    else
                        "\n";

                    echo "\t\t\t<p class='postParagraph'>". $post["content"] ."</p>\n";
                    echo "\t\t\t<a href='Post.php?post=". $post["id_post"] ."'><img src='..\\images\\icons\\expand.png' alt='expand' class='expand'></a>\n";
                    echo "\t\t</article>\n";
                }
            }
        }  
    }