<?php
    require "Autoloader.php";

    class LabelModel implements LabelModelInterface {

        // Member Variables
        protected $dbc;

        // Constructor
        public function __construct(DatabaseConnectionInterface $Database) {

            $this->dbc = $Database->connect();
            $this->dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        }

        // Member Functions
        public function setLabel(string $name) : bool {

            $stmt = $this->dbc->prepare('insert into label(name) values (?)');
            return $stmt->execute(array($name));
        }

        public function unsetComment(int $labelID) : bool {

            $stmt = $this->dbc->prepare('update label set is_deleted = 1 where id_label = ?');
            return $stmt->execute(array($labelID));
        }

        public function getLabelsByUserSubscriptions($userID) : ?array {

            $stmt = $this->dbc->prepare('select l.* from label as l left join user_follows_label as ufl on ufl.id_label = l.id_label where ufl = ? order by l.name');
            return $stmt->execute(array($userID));
        }
    }