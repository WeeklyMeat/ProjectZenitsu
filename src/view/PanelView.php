<?php

    class PanelView {

        // Member Variables
        protected $panel;

        // Constructor
        public function __construct($panel) {

            $this->panel = $panel;
        }

        // Member Functions
        public function outputPanel() {

            $location = "..\\images\\profile\\STANDART_IMAGE.png";
            if (!empty($this->panel["avatar_location"]) && file_exists("..\\images\\profile\\". $this->panel["avatar_location"] .".jpg"))
                $location = "..\\images\\profile\\". $this->panel["avatar_location"] .".jpg";

            $name = $this->panel["username"] ?? $this->panel["name"];

            echo "\t\t<section class='panel_container'>\n";
            echo "\t\t\t<img src='". $location ."' alt='Avatar' class='panel_avatar'>\n";
            echo "\t\t\t<p class='panel_name'>". $name ."</p>\n";
            echo "\t\t\t<p class='panel_text'>". $this->panel["description"] ."</p>\n";
            echo "\t\t</section>\n";
        }
    }