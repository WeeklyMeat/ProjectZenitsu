<?php
    require "Autoloader.php";

    class UserModel implements UserModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions
        public function setUser(string $username, string $email, string $password) : bool {

            $stmt = $this->dbc->prepare('insert into user(username, email, password) values (?, ?, ?)');
            return $stmt->execute(array($username, $email, password_hash($password, PASSWORD_DEFAULT)));
        }

        public function getUserByUsername(string $username){

            $stmt = $this->dbc->prepare('select * from user where username = ?');
            $stmt->execute(array($username));
            return $stmt->fetchAll();
        }

        public function getUserByEmail(string $email){

            $stmt = $this->dbc->prepare('select * from user where email = ?');
            $stmt->execute(array($email));
            return $stmt->fetchAll();
        }
    }