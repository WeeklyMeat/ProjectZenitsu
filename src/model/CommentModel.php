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
        public function setComment(string $content, int $userID, int $postID) : bool {

            $stmt = $this->dbc->prepare('insert into comment(content, id_user, id_post) values (?, ?, ?)');
            return $stmt->execute(array($content, $userID, $postID));
        }

        public function unsetComment(int $commentID) : bool {

            $stmt = $this->dbc->prepare('update comment set is_deleted = 1 where id_comment = ?');
            return $stmt->execute(array($commentID));
        }

        public function getCommentByID(int $commentID) : ?array {

            $stmt = $this->dbc->prepare('select * from comment where id = ?');
            $stmt->execute(array($commentID));
            return $stmt->fetchAll();
        }

        public function getCommentsByPost(int $postID) : ?array {

            $stmt = $this->dbc->prepare('select c.*, u.username, u.avatar_location from comment as c left join post as p on p.id_post = c.id_post left join user as u on u.id_user = c.id_user where p.id_post = ? order by c.creation_time desc');
            $stmt->execute(array($postID));
            return $stmt->fetchAll();
        }
    }