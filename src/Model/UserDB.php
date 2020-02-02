<?php
    require_once "UserClass.php";
    require_once "DatabaseInterface.php";

    class UserDB {
        
        // Member Variables
        protected $DBConnection;
        
        // Member Functions
        public function Store(User $User) {
            
            $DB = $this->DBConnection->Connect();
            $stmt = $DB->prepare("insert into User(Username, Firstname, Lastname, Email, Password) values (?, ?, ?, ?, ?)");
            $stmt->bind_param('sssss', $User->GetUsername(), $User->GetFirstname(), $User->GetLastname, $User->GetEmail(), $User->GetPassword());
            $stmt->execute();
            $stmt->close();
            $User->SetID($DB->insert_id);
        }
        
        // Constructor
        function __construct(DatabaseInterface $DBConnection) {
            
            $this->DBConnection = $DBConnection;
        }
    }