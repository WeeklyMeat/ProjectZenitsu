<?php
    require "Autoloader.php";

    class UserModel implements UserModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
        }

        // Member Functions
        public function setUser($username, $email, $password) : bool {

            $stmt = $this->dbc->prepare('insert into user(username, email, password) values (?, ?, ?)');
            return $stmt->execute(array($username, $email, password_hash($password, PASSWORD_DEFAULT)));
        }

        public function getUserByUsername($username){

            $stmt = $this->dbc->prepare('select * from user where username = ?');
            $stmt->execute(array($username));
            return $stmt->fetch();
        }

        public function getUserByEmail($email){

            $stmt = $this->dbc->prepare('select * from user where email = ?');
            $stmt->execute(array($email));
            return $stmt->fetch();
        }

        public function followUser($userFollowing, $userToBeFollowed) : bool {

            $stmt = $this->dbc->prepare('insert into user_follows_user(id_user_following, id_user_followed) values (?, ?)');
            return $stmt->execute(array($userFollowing, $userToBeFollowed));
        }

        public function followLabel($userID, $labelID) : bool {

            $stmt = $this->dbc->prepare('insert into user_follows_label(id_user, id_label) values (?, ?)');
            return $stmt->execute(array($userID, $labelID));
        }
    }