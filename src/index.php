<?php
    require "Autoloader.php";

    $dbc = new DatabaseConnection();
    $userContr = new UserContr(new UserModel($dbc));
    $commentContr = new CommentContr(new CommentModel($dbc));
    $postContr = new PostContr(new PostModel($dbc));
    $followContr = new FollowContr(new UserFollowsLabelModel($dbc));
    $likeContr = new LikeContr(new UserLikesCommentModel($dbc));

    $userContr->login("WeeklyMeat", "1234");

    $i = 3;
    echo var_dump($postContr->getPostByID($i));
    echo var_dump($commentContr->getMultipleCommentsByPost($i));
    $userContr->logout();
?>