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

        public function getMultiplePosts($limit) {

            $result = $this->dbc->query('select * from post order by creation_time desc limit '. $limit);
            return $result->fetchAll();
        }

        public function getMultiplePostsByLabel($limit, $labelID) {

            $result = $this->dbc->query('select * from post where id_label = '. $labelID .' order by creation_time desc limit '. $limit);
            return $result->fetchAll();
        }
    }