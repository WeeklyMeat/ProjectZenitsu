<?php

    class NavbarView {

        // Member Functions
        public static function outputNavOptionsLoggedOut () : void {

            echo "\n\t\t\t\t<a href='Index.php' class='link'><li class='nav_list_item link'>Home</li></a>\n";
            echo "\t\t\t\t<hr>\n";
            echo "\t\t\t\t<a href='Login.php' class='link'><li class='nav_list_item link'>Login</li></a>\n";
            echo "\t\t\t\t<a href='Register.php' class='link'><li class='nav_list_item link'>Register</li></a>\n";
            return;
        }

        public static function outputNavOptionsLoggedIn () : void {

            echo "\n\t\t\t\t<a href='Index.php?mode=feed' class='link'><li class='nav_list_item link'>Home</li></a>\n";
            echo "\t\t\t\t<a href='Index.php' class='link'><li class='nav_list_item link'>Discover</li></a>\n";
            echo "\t\t\t\t<a href='Index.php?mode=follow' class='link'><li class='nav_list_item link'>Followed</li></a>\n";
            echo "\t\t\t\t<hr>\n";
            echo "\t\t\t\t<a href='User.php?user=". $_SESSION["user"] ."' class='link'><li class='nav_list_item link'>Profile</li></a>\n";
            echo "\t\t\t\t<a href='Index.php?logout=true' class='link'><li class='nav_list_item link'>Logout</li></a>\n";
            return;
        }
    }