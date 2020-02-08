<?php
    require_once "DatabaseConnection.php";
    require_once "PostModelInterface.php";

    class PostModel implements PostModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions$
        public function setPost($content, $userFK, $labelFK) {

            $stmt = $this->dbc->prepare('insert into post(content, id_user, id_label) values (?, ?, ?)');
            return $stmt->execute(array($content, $userFK, $labelFK));
        }

        public function getPostByID() {

        }

        public function getMultiplePosts($offset, $limit) {

            $stmt = $this->dbc->prepare('select * from post order by creation_time desc limit ?, ?');
            $stmt->execute(array($offset, $limit));
            return $stmt->fetchAll();
        }

        public function getMultiplePostsByLabel($offset, $limit, $labelID) {

            $stmt = $this->dbc->prepare('select * from post where id_label = ? order by creation_time desc limit ?, ?');
            $stmt->execute(array($labelID, $offset, $limit));
            return $stmt->fetchAll();
        }
    }