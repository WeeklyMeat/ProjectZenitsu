<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User</title>
    <meta name="description" content="bla">
    <meta name="author" content="WeeklyMeat">
    <meta name="keywords" content="Social, Media, Network, Friends, Opinions">
    <link rel="stylesheet" type="text/css" href="style/lightmode.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="stylesheet" type="text/css" href="style/panel.css">
    <link rel="stylesheet" type="text/css" href="style/content.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<?php
    require "Autoloader.php";
    if(!isset($_SESSION))
        session_start();

    $dbc = new DatabaseConnection();
    $labelContr = new LabelContr(new LabelModel($dbc));
    $postContr = new PostContr(new PostModel($dbc));
?>
<body>
    <div class = "sidebar" id = "sidebar_left">
        <nav class="nav">
            <ul class="nav_list"><?php 

                if(isset($_SESSION["user"]))
                    NavbarView::outputNavOptionsLoggedIn();

                else 
                    NavbarView::outputNavOptionsLoggedOut(); 
            ?>
            </ul>
        </nav>
    </div>
    <section id="content">
<?php       // PHP section

            if(isset($_GET["label"]) && $name = trim(htmlspecialchars($_GET["label"]))) {

                $label = $labelContr->getLabelByName($name)[0];

                if(empty($label))
                    header("Location: Index.php");

                $panelView = new PanelView($label);
                $panelView->outputPanel();

                if(isset($_GET["offset"]) && !empty($_GET["offset"]))
                    $offset = intval($_GET["offset"]);

                $posts = $postContr->getPostsByLabel($offset ?? 0, 20, $name);

                $postView = new PostView($posts);
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