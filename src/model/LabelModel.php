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

            $stmt = $this->dbc->prepare('update comment set is_deleted = 1 where id_comment = ?');
            return $stmt->execute(array($commentID));
        }
    }