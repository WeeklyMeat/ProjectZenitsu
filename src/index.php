<?php
    require_once "Controller\\UserContr.php";
    //require_once "Controller\\PostContr.php";
    require_once "Model\\PostModel.php";

    // $contr = new UserContr(new UserModel(new DatabaseConnection()));
    // $contr->createUser("Marin", "marin@tokic.ch", "1234");
    // $contr->login("WeeklyMeat", "1234");
    // $contr->logout();

    $model = new PostModel(new DatabaseConnection());
    echo var_dump($model->getMultiplePosts(0, 20));
?>