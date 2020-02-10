<?php
    require "Autoloader.php";

    class CommentModel implements CommentModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions
        public function setComment($content, $userID, $postID) : bool {

            $stmt = $this->dbc->prepare('insert into comment(content, id_user, id_post) values (?, ?, ?)');
            return $stmt->execute(array($content, $userID, $postID));
        }

        public function unsetComment($ID) : bool {

            $stmt = $this->dbc->prepare('update comment set is_deleted = 1 where id_comment = ?');
            return $stmt->execute(array($ID));
        }

        public function getMultipleCommentsByPost($postID) : ?array {

            $stmt = $this->dbc->prepare('select c.id_comment, c.content, c.like_count, c.creation_time, c.id_user, c.id_post from comment as c left join post as p on p.id_post = c.id_post where p.id_post = ?');
            $stmt->execute(array($postID));
            return $stmt->fetchAll();
        }
    }