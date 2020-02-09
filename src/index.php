<?php
    require_once "Controller\\UserContr.php";
    require_once "Controller\\PostContr.php";

    // $contr = new UserContr(new UserModel(new DatabaseConnection()));
    // $contr->createUser("ExampleUser", "example@mail.ch", "1234");
    // $contr->login("WeeklyMeat", "1234");
    // $contr->logout();

    $contr = new PostContr(new PostModel(new DatabaseConnection()));
    echo var_dump($contr->getMultiplePosts(0, 20));
?>