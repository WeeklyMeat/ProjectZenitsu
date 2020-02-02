<?php
    require_once "UserClass.php";

    class Post {
        
        // Member Variables
        protected $ID;
        protected $Content;
        protected $PostTime;
        protected $FKUser;
        
        // Member Functions
        
            // Getter & Setter
            function SetID($ID) {
                $this->ID = $ID;
            }
            
            function GetContent() {
                return $this->Content;
            }
            
            function GetFKUser() {
                return $this->FKUser;
            }
            
        // Constructor
        function __construct($Content, $FKUser) {
            
            $this->Content = $Content;
            $this->FKUser = $FKUser;
        }
    }