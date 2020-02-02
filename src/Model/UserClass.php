<?php

    class User {
        
        // Member Variables
        protected $id;
        
        protected $username;
        protected $email;
        protected $password;

        protected $firstname;
        protected $lastname;
        protected $creationTime;

        protected $biography;
        
        // Member Functions
        
            // Getter & Setter
            function SetID($id) {
                $this->Iid = $id;
            }
            
            function GetID() {
                return $this->id;
            }
            
            function GetUsername() {
                return $this->username;
            }
            
            function GetFirstname() {
                return $this->firstname;
            }
            
            function GetLastname() {
                return $this->lastname;
            }
            
            function GetEmail() {
                return $this->email;
            }
            
            function GetPassword() {
                return $this->password;
            }
        
        // Constructor
        function __construct($username, $email, $password, $firstname, $lastname, $biography) {
            
            $this->Username = $Username;
            $this->Email = $Email;
            $this->Password = $Password;
        }
    }