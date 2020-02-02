<?php
    require_once "..\\MySQLConnection.php";

    class UserModel extends MySQLConnection {

        // Member Variables
        protected $username;
        protected $email;
        protected $biography;

        // Member Functions
        public function setUser($username, $email, $password) {

            $dbc = $this->connect();
            $stmt = $dbc->prepare('insert into user(username, email, password) values (?, ?, ?)');
            $stmt->bind_param('sss', $username, $email, password_hash($password, PASSWORD_DEFAULT));
            return $stmt->execute();
        }

        public function doesExist($dataToProve, $columnToSearch) {

            $dbc = $this->connect();
            $stmt = $dbc->prepare('select username from user where '. $columnToSearch .' = ?');
            $stmt->bind_param('s', $dataToProve);
            $stmt->execute();

            $result = $stmt->get_result();
            if(empty($result->fetch_all())) {
                return false;
            }
            else {
                return true;
            }
        }

        public function getUser($username) {

            $dbc = $this->connect();
            $stmt = $dbc->prepare('select * from user where username = ?');
            $stmt->bind_param('s', $username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

            // Getter & Setter
            public function getUsername() {
                return $this->username;
            }

            public function setEmail($email) {
                $this->email = $email;
            }

            public function setBiography($biography) {
                $this->biography = $biography;
            }
    }