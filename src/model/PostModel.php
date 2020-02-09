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

        // Member Functions
        public function setPost($content, $userFK, $labelFK) : bool {

            $stmt = $this->dbc->prepare('insert into post(content, id_user, id_label) values (?, ?, ?)');
            return $stmt->execute(array($content, $userFK, $labelFK));
        }

        public function unsetPost($ID) : bool {

            $stmt = $this->dbc->prepare('update post set is_deleted = 1 where id_post = ?');
            return $stmt->execute(array($ID));
        }

        public function getPostByID($ID) : ?array {

            $stmt = $this->dbc->prepare('select * from post where id_post = ?');
            $stmt->execute(array($ID));
            return $stmt->fetch();
        }

        public function getMultiplePosts($offset, $limit) : ?array {

            $stmt = $this->dbc->prepare('select * from post where is_deleted = 0 order by creation_time desc limit ?, ?');
            $stmt->execute(array($offset, $limit));
            return $stmt->fetchAll();
        }

        public function getMultiplePostsByUser($offset, $limit, $userID) : ?array {

            $stmt = $this->dbc->prepare('select * from post where id_user = ? and is_deleted = 0 order by creation_time desc limit ?, ?');
            $stmt->execute(array($userID, $offset, $limit));
            return $stmt->fetchAll();
        }

        public function getMultiplePostsByLabel($offset, $limit, $labelID) : ?array {

            $stmt = $this->dbc->prepare('select * from post where id_label = ? and is_deleted = 0 order by creation_time desc limit ?, ?');
            $stmt->execute(array($labelID, $offset, $limit));
            return $stmt->fetchAll();
        }
    }