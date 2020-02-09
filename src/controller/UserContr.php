<?php
    require_once "model\\UserModel.php";
    require_once "model\\UserModelInterface.php";

    class UserContr {

        // Member Variables
        protected $userModel;

        // Constructor
        public function __construct(UserModelInterface $userModel) {

            $this->userModel = $userModel;
        }

        // Member Functions
        public function createUser($username, $email, $password) : bool {

            if($this->userModel->getUserByUsername($username) || $this->userModel->getUserByEmail($email)) {
                return false;
            }
            return $this->userModel->setUser($username, $email, $password);
        }

        public function login($username, $password) : bool {

            if($this->authenticate($username, $password)) {

                session_start();
                session_regenerate_id();
                $_SESSION["user"] = $username;
                $_SESSION["id"] = $this->userModel->getUserByUsername($username)['id_user'];
                session_write_close();
                return true;
            }
            else {

                return false;
            }
        }

        protected function authenticate($username, $password) : bool {

            if(!$this->userModel->getUserByUsername($username, "username")) {
                return false;
            }

            $user = $this->userModel->getUserByUsername($username);
            return password_verify($password, $user['password']);
        }

        public function logout() : void {

            session_start();
            session_unset();
            session_destroy();
        }
    }