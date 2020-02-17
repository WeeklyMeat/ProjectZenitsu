<?php

    class LabelView {

        // Member Variables
        protected $labels;

        // Constructor
        public function __construct($labels) {

            $this->labels = $labels;
        }

        // Member Functions
        public function outputLabelsLoggedIn () : void {

            echo "\n\t\t<nav class='navbar'>\n";
            echo "\t\t\t<ul class='nav-list'>\n";
            
            foreach($this->labels as $label) {

                echo "\t\t\t\t<a href='Index.php?mode=label&label=". $label["name"] ."' class='link'><li class='nav-item'>". $label["name"] ."</li></a>\n";
            }

            echo "\t\t\t<ul>\n";
            echo "\t\t<nav>\n";
            return;
        }
    }