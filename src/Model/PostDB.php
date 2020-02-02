<?php
    require_once "PostClass.php";
    require_once "DatabaseInterface.php";

    Class PostDB {
        
        // Member Variables
        protected $DBConnection;
        
        // Member Functions
        public function Store(Post $Post) {
            
            $DB = $this->DBConnection->Connect();
            $stmt = $DB->prepare("insert into Post(content, user_id_user) values (?, ?)");
            $stmt->bind_param('si', $Post->GetContent(), $Post->GetFKUser());
            $stmt->execute();
            $stmt->close();
            $Post->SetID($DB->insert_id);
        }
        
        // Constructor
        function __construct(DatabaseInterface $DBConnection) {
            
            $this->DBConnection = $DBConnection;
        }
    }