<?php
    require_once "Controller\\UserContr.php";
    require_once "Controller\\PostContr.php";
    require_once "Controller\\CommentContr.php";

    // $contr = new UserContr(new UserModel(new DatabaseConnection()));
    // $contr->createUser("ExampleUser", "example@mail.ch", "1234");
    // $contr->login("WeeklyMeat", "1234");
    // $contr->logout();

    $commentContr = new CommentContr(new CommentModel(new DatabaseConnection()));
    $postContr = new PostContr(new PostModel(new DatabaseConnection()));

    //$commentContr->createComment("Blibb blubb", 2, 3);

    $i = 6;

    echo var_dump($postContr->getPostByID($i));
    echo var_dump($commentContr->getMultipleCommentsByPost($i));
?>