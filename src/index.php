<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Project Zenitsu</title>
    <meta name="description" content="bla">
    <meta name="author" content="WeeklyMeat">
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/darkmode.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<?php
    require "Autoloader.php";
    if(!isset($_SESSION))
        session_start();

    $dbc = new DatabaseConnection();
    $postContr = new PostContr(new PostModel($dbc));
    $userContr = new UserContr(new UserModel($dbc));

    if(isset($_GET["logout"]) && $_GET["logout"] == true)
        $userContr->logout();
?>
<body>
    <div class = "sidebar" id = "sidebar_left">
        <nav class="navbar">
            <ul class="nav-list"><?php

                if(isset($_SESSION["user"]))
                    NavbarView::outputNavOptionsLoggedIn();

                else
                    NavbarView::outputNavOptionsLoggedOut();
            ?>
            </ul>
        </nav>
    </div>
    <section id = "content">
<?php       // PHP section

            if(isset($_GET["offset"]) && !empty($_GET["offset"]))
                $offset = intval($_GET["offset"]);

            if(isset($_SESSION["id"])) {

                if(isset($_GET["mode"]) && !empty($mode = trim(htmlspecialchars($_GET["mode"])))) {

                    if($mode === "feed")
                        $posts = $postContr->getPostsByLabelSubscriptions($offset ?? 0, 20, $_SESSION["id"]);

                    if($mode === "follow")
                        $posts = $postContr->getPostsByUserSubscribtions($offset ?? 0, 20, $_SESSION["id"]);
                }
                else
                    $posts = $postContr->getNewestPosts($offset ?? 0, 20);
            }
            else
                $posts = $postContr->getNewestPosts($offset ?? 0, 20);

            $postView = new PostView($posts);
            $postView->outputPosts();
?>
    </section>
    <div class = "sidebar" id = "sidebar_right">
    </div>
</body>
</html>