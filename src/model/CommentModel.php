<?php
    require_once "DatabaseConnection.php";
    require_once "CommentModelInterface.php";

    class CommentModel implements CommentModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions
        public function setComment($content, $userID, $labelID) : bool {

            $stmt = $this->dbc->prepare('insert into comment(content, id_user, id_post) values (?, ?, ?)');
            return $stmt->execute(array($content, $userID, $postID));
        }

        public function unsetComment($ID) : bool {

            $stmt = $this->dbc->prepare('update comment set is_deleted = 1 where id_comment = ?');
            return $stmt->execute(array($ID));
        }

        public function getMultipleCommentsByPost($postID) : ?array {

            $stmt = $this->dbc->prepare('select * from post where id_post = ? and is_deleted = 0 order by creation_time desc');
            $stmt->execute(array($postID));
            return $stmt->fetchAll();
        }
    }