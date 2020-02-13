<?php

    class NavbarView {

        // Member Functions
        public static function outputNavOptionsLoggedOut () : void {

            echo "\n\t\t\t\t<a href='Index.php' class='nav-link'><li class='nav-item'>Home</li></a>\n";
            echo "\t\t\t\t<hr>\n";
            echo "\t\t\t\t<a href='Login.php' class='nav-link'><li class='nav-item'>Login</li></a>\n";
            echo "\t\t\t\t<a href='Register.php' class='nav-link'><li class='nav-item'>Register</li></a>\n";
            return;
        }

        public static function outputNavOptionsLoggedIn () : void {

            echo "\n\t\t\t\t<a href='Index.php?mode=feed' class='nav-link'><li class='nav-item'>Home</li></a>\n";
            echo "\t\t\t\t<a href='Index.php' class='nav-link'><li class='nav-item'>Discover</li></a>\n";
            echo "\t\t\t\t<a href='Index.php?mode=follow' class='nav-link'><li class='nav-item'>Followed</li></a>\n";
            echo "\t\t\t\t<hr>\n";
            echo "\t\t\t\t<a href='Index.php?logout=true' class='nav-link'><li class='nav-item'>Logout</li></a>\n";
            return;
        }
    }