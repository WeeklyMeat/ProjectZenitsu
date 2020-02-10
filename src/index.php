<?php
    require_once "Controller\\UserContr.php";
    require_once "Controller\\PostContr.php";
    require_once "Controller\\CommentContr.php";

    $dbc = new DatabaseConnection();
    $userContr = new UserContr(new UserModel($dbc));
    $commentContr = new CommentContr(new CommentModel($dbc));
    $postContr = new PostContr(new PostModel($dbc));

    $userContr->login("WeeklyMeat", "1234");
    $i = 1;
    echo var_dump($postContr->getPostByID($i));
    echo var_dump($commentContr->getMultipleCommentsByPost($i));
    $userContr->logout();
?>