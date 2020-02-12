<?php
    require "Autoloader.php";

    class PostModel implements PostModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions
        public function setPost(string $content, int $userID, int $labelID) : bool {

            $stmt = $this->dbc->prepare('insert into post(content, id_user, id_label) values (?, ?, ?)');
            return $stmt->execute(array($content, $userID, $labelID));
        }

        public function unsetPost(int $postID) : bool {

            $stmt = $this->dbc->prepare('update post set is_deleted = 1 where id_post = ?');
            return $stmt->execute(array($postID));
        }

        public function getPostByID(int $postID) : ?array {

            $stmt = $this->dbc->prepare('select * from post where id_post = ?');
            $stmt->execute(array($postID));
            return $stmt->fetchAll();
        }

        public function getMultiplePosts(int $offset, int $limit) : ?array {

            $stmt = $this->dbc->prepare('select * from post where is_deleted = 0 order by creation_time desc limit ?, ?');
            $stmt->execute(array($offset, $limit));
            return $stmt->fetchAll();
        }

        public function getMultiplePostsByUser(int $offset, int $limit, int $userID) : ?array {

            $stmt = $this->dbc->prepare('select * from post where id_user = ? and is_deleted = 0 order by creation_time desc limit ?, ?');
            $stmt->execute(array($userID, $offset, $limit));
            return $stmt->fetchAll();
        }

        public function getMultiplePostsByLabel(int $offset, int $limit, int $labelID) : ?array {

            $stmt = $this->dbc->prepare('select * from post where id_label = ? and is_deleted = 0 order by creation_time desc limit ?, ?');
            $stmt->execute(array($labelID, $offset, $limit));
            return $stmt->fetchAll();
        }
    }