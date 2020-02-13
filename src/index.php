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

    $dbc = new DatabaseConnection();
    $postContr = new PostContr(new PostModel($dbc));
    $userContr = new UserContr(new UserModel($dbc));

    $userContr->login("WeeklyMeat", "1234");
?>
<body>
    <div class = "sidebar" id = "sidebar_left">
        <nav class="navbar">
            <ul class="nav-list">
                <a href="Index.php?mode=feed" class="nav-link"><li class="nav-item">Home</li></a>
                <a href="Index.php" class="nav-link"><li class="nav-item">Discover</li></a>
                <a href="Index.php?mode=follow" class="nav-link"><li class="nav-item">Followed</li></a>
            </ul>
        </nav>
    </div>
    <section id = "content">
        <?php

            if(isset($_GET["offset"]) && !empty($_GET["offset"]))
                $offset = intval($_GET['offset']);
                
            if(isset($_GET["mode"]) && !empty($_GET["mode"])) {

                if(!isset($_SESSION["id"]))
                    header("Location: Index.php");

                $mode = trim(htmlspecialchars($_GET["mode"]));

                if($mode === "feed")
                    $posts = $postContr->getMultiplePostsByFeed($offset ?? 0, 20, $_SESSION["id"]);

                if($mode === "follow")
                    $posts = $postContr->getMultiplePostsByFollows($offset ?? 0, 20, $_SESSION["id"]);
            }
            else {
                    
                $posts = $postContr->getMultiplePosts($offset ?? 0, 20);
            }

            $postView = new PostView($posts);
            $postView->outputPosts();
        ?>
    </section>
    <div class = "sidebar" id = "sidebar_right"></div>
</body>
</html>