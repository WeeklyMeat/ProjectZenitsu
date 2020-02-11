<?php
    require "Autoloader.php";

    class UserFollowsLabelModel implements FollowModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions
        public function setFollow(int $userID, int $contentID) : bool {

            $stmt = $this->dbc->prepare('insert into user_follows_label(id_user, id_label) values (?, ?)');
            return $stmt->execute(array($userID, $contentID));
        }

        public function unsetFollow(int $userID, int $contentID) : bool {

            $stmt = $this->dbc->prepare('delete from user_follows_label where id_user = ? and id_label = ?');
            return $stmt->execute(array($userID, $contentID));
        }

        public function getFollow(int $userID, int $contentID) : ?array {

            $stmt = $this->dbc->prepare('select from user_follows_label where id_user = ? and id_label = ?');
            return $stmt->execute(array($userID, $contentID))->fetch();
        }
    }