<?php
    require_once "DatabaseConnection.php";
    require_once "PostModelInterface.php";

    class PostModel implements PostModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
        }

        // Member Functions$
        public function setPost($content, $userFK, $labelFK) {

            $stmt = $this->dbc->prepare('insert into post(content, id_user, id_label) values (?, ?, ?)');
            return $stmt->execute(array($content, $userFK, $labelFK));
        }

        public function getPostByID() {

        }

        public function getPostByLabel() {

        }

        public function getAllPost() {

        }
    }