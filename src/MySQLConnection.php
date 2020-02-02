<?php

    class MySQLConnection {

        // Member Variables
        private $host = 'localhost';
        private $user = 'ProjectZenitsuDB_User';
        private $password = '1234';
        private $database = 'ProjectZenitsuDB';

        // Member Functions
        protected function connect() {

            return new mysqli($this->host, $this->user, $this->password, $this->database);
        }
    }