<?php

    class UserView {

        // Member Variables
        protected $user;

        // Constructor
        public function __construct($user) {

            $this->user = $user;
        }

        // Member Functions
        public function outputUser() {

            $location = "..\\images\\profile\\STANDART_IMAGE.png";
            if (!empty($this->user["avatar_location"]) && file_exists("..\\images\\profile\\". $this->user["avatar_location"] .".jpg"))
                $location = "..\\images\\profile\\". $this->user["avatar_location"] .".jpg";

            echo "\t\t<section class='userProfile'>\n";
            echo "\t\t\t<img src='". $location ."' alt='Profile Picture' class='profilePicture userPicture'>\n";
            echo "\t\t\t <p class='userTitle'>". $this->user["username"] ."</p>\n";
            echo "\t\t\t <p class='userParagraph'>". $this->user["biography"] ."</p>\n";
            echo "\t\t</section>\n";
        }
    }