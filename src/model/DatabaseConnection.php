<?php
    require "Autoloader.php";

    class DatabaseConnection implements DatabaseConnectionInterface{

        // Member Variables
        private $host = 'localhost';
        private $database = 'ProjectZenitsuDB';
        private $user = 'ProjectZenitsuDB_User';
        private $password = '1234';
        
        // Member Functions
        public function connect() {

            return new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);
        }
    }