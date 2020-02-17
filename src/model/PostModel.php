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

            $stmt = $this->dbc->prepare('select p.*, u.username, u.avatar_location from post as p left join user as u on u.id_user = p.id_user where p.id_post = ?');
            $stmt->execute(array($postID));
            return $stmt->fetchAll();
        }

        public function getNewestPosts(int $offset, int $limit) : ?array {

            $stmt = $this->dbc->prepare('select p.*, u.username, u.avatar_location from post as p left join user as u on u.id_user = p.id_user where is_deleted = 0 order by p.creation_time desc limit ?, ?');
            $stmt->execute(array($offset, $limit));
            return $stmt->fetchAll();
        }

        public function getPostsByUser(int $offset, int $limit, int $userID) : ?array {

            $stmt = $this->dbc->prepare('select p.*, u.username, u.avatar_location from post as p left join user as u on u.id_user = p.id_user where p.id_user = ? and is_deleted = 0 order by p.creation_time desc limit ?, ?');
            $stmt->execute(array($userID, $offset, $limit));
            return $stmt->fetchAll();
        }

        public function getPostsByLabel(int $offset, int $limit, int $labelID) : ?array {

            $stmt = $this->dbc->prepare('select p.*, u.username, u.avatar_location from post as pleft join user as u on u.id_user = p.id_user where p.id_label = ? and is_deleted = 0 order by p.creation_time desc limit ?, ?');
            $stmt->execute(array($labelID, $offset, $limit));
            return $stmt->fetchAll();
        }

        public function getPostsByLabelSubscriptions(int $offset, int $limit, int $userID) : ?array {

            $stmt = $this->dbc->prepare('select p.*, u.username, u.avatar_location from post as p left join label as l on l.id_label = p.id_label left join user_follows_label as ufl on ufl.id_label = l.id_label left join user as u on u.id_user = ufl.id_user where ufl.id_user = ? order by p.creation_time desc limit ?, ?');
            $stmt->execute(array($userID, $offset, $limit));
            return $stmt->fetchAll();
        }

        public function getPostsByUserSubscribtions(int $offset, int $limit, int $userID) : ?array {

            $stmt = $this->dbc->prepare('select p.*, u.username, u.avatar_location from post as p left join user_follows_user as ufu on ufu.id_user_followed = p.id_user left join user as u on u.id_user = p.id_user where ufu.id_user_following = ? order by p.creation_time desc limit ?, ?');
            $stmt->execute(array($userID, $offset, $limit));
            return $stmt->fetchAll();
        }
    }