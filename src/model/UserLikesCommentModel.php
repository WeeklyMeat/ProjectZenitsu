<?php
    include "Autoloader.php";

    class UserLikesCommentModel implements LikeModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions
        public function setLike($userID, $contentID) : bool {

            $stmt = $this->dbc->prepare('insert into user_likes_comment(id_user, id_post) values (?, ?)');
            return $stmt->execute(array($userID, $contentID));
        }

        public function unsetLike($userID, $contentID) : bool {

            $stmt = $this->dbc->prepare('delete from user_likes_comment where id_user = ? and id_post = ?');
            return $stmt->execute(array($userID, $contentID));
        }

        public function getLike($userID, $contentID) : ?array {

            $stmt = $this->dbc->prepare('select * from user_likes_comment where id_user = ? and id_post = ?');
            return $stmt->execute(array($userID, $contentID))->fetch();
        }
    }