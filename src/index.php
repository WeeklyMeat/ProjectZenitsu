<?php
    require_once "UserContr.php";

    $contr = new UserContr(new UserModel(new DatabaseConnection()));
    // $contr->createUser("Marin", "marin@tokic.ch", "1234");
    // $contr->login("WeeklyMeat", "1234");
    // $contr->logout();
?>