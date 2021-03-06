<?php
    require "Autoloader.php";

    class UserFollowsUserModel implements FollowModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions
        public function setFollow(int $userID, int $contentID) : bool {

            $stmt = $this->dbc->prepare('insert into user_follows_user(id_user_following, id_user_followed) values (?, ?)');
            return $stmt->execute(array($userID, $contentID));
        }

        public function unsetFollow(int $userID, int $contentID) : bool {

            $stmt = $this->dbc->prepare('delete from user_follows_user where id_user_following = ? and id_user_followed = ?');
            return $stmt->execute(array($userID, $contentID));
        }

        public function getFollow(int $userID, int $contentID) : ?array {

            $stmt = $this->dbc->prepare('select from user_follows_user where id_user_following = ? and id_user_followed = ?');
            return $stmt->execute(array($userID, $contentID))->fetch();
        }
    }