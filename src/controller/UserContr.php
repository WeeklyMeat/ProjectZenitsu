<?php
    require "Autoloader.php";

    class UserContr {

        // Member Variables
        protected $userModel;

        // Constructor
        public function __construct(UserModelInterface $userModel) {

            $this->userModel = $userModel;
        }

        // Member Functions
        public function createUser($username, $email, $password) : bool {

            $username = trim(htmlspecialchars($username));
            $email = trim(htmlspecialchars($email));
            $password = trim(htmlspecialchars($password));

            if($this->userModel->getUserByUsername($username) || $this->userModel->getUserByEmail($email))
                return false;

            if(strlen($username) <= 255 && strlen($username) > 0 && strlen($email) <= 255 && strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL))
                return $this->userModel->setUser($username, $email, $password);

            return false;
        }

        public function login($username, $password) : bool {

            if($this->authenticate($username, $password)) {

                if(!isset($_SESSION))
                    session_start();
                    
                session_regenerate_id();
                $_SESSION["user"] = $username;
                $_SESSION["id"] = $this->userModel->getUserByUsername($username)[0]["id_user"];
                session_write_close();
                return true;
            }
            else {

                return false;
            }
        }

        protected function authenticate($username, $password) : bool {

            $username = trim(htmlspecialchars($username));
            $password = trim(htmlspecialchars($password));

            if(!$this->userModel->getUserByUsername($username, "username")) {
                return false;
            }

            $user = $this->userModel->getUserByUsername($username);
            return password_verify($password, $user[0]['password']);
        }

        public function logout() : void {

            if(!isset($_SESSION))
                session_start();

            session_unset();
            session_destroy();
        }

        protected function getUserByUsername($username) {

            $username = trim(htmlspecialchars($username));

            if(!empty($username))
                return $this->userModel->getUserByUsername();

            return false;
        }
    }