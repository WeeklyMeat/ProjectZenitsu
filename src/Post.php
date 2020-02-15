<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Project Zenitsu</title>
    <meta name="description" content="bla">
    <meta name="author" content="WeeklyMeat">
    <link rel="stylesheet" type="text/css" href="style/Main.css">
    <!-- <link rel="stylesheet" type="text/css" href="style/darkmode.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<?php
    require "Autoloader.php";
    if(!isset($_SESSION))
        session_start();

    $dbc = new DatabaseConnection();
    $postContr = new PostContr(new PostModel($dbc));
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

            if(isset($_GET["post"]) && $postID = intval($_GET["post"])) {

                $post = $postContr->getPostByID($postID);

                if(empty($post))
                    header("Location: Index.php");

                $postView = new PostView($post);
                $postView->outputPosts();
            }
            else
                header("Location: Index.php");
        ?>
    </section>
    <div class = "sidebar" id = "sidebar_right">
    </div>
</body>
</html>