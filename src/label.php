<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo "Label '". $_GET["label"] ."'"; ?></title>
    <meta name="description" content="bla">
    <meta name="author" content="WeeklyMeat">
    <meta name="keywords" content="Social, Media, Network, Friends, Opinions">
    <link rel="stylesheet" type="text/css" href="style/lightmode.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="stylesheet" type="text/css" href="style/panel.css">
    <link rel="stylesheet" type="text/css" href="style/content.css">
    <link rel="stylesheet" type="text/css" href="style/create.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<?php
    require "Autoloader.php";
    if(!isset($_SESSION))
        session_start();

    $dbc = new DatabaseConnection();
    $labelContr = new LabelContr(new LabelModel($dbc));
    $postContr = new PostContr(new PostModel($dbc));

    if(isset($_GET["label"]) && $name = trim(htmlspecialchars($_GET["label"]))) {
        $label = $labelContr->getLabelByName($name)[0];
        if(empty($label))
            header("Location: Index.php");
    }
    else
        header("Location: Index.php");

    if(isset($_POST["createPost"]) && strlen($_POST["createPost"]) < 256 && isset($_POST["createPostSubmit"])) {

        $postContent = trim(htmlspecialchars($_POST["createPost"]));
        $postContr->createPost($postContent, $_SESSION["id"], $label["id_label"]);
    }
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

        $panelView = new PanelView($label);
        $panelView->outputPanel();

        if(isset($_GET["offset"]) && !empty($_GET["offset"]))
            $offset = intval($_GET["offset"]);

        $posts = $postContr->getPostsByLabel($offset ?? 0, 20, $name);

        $postView = new PostView($posts);
        $postView->outputPosts();
?>
    </section>
    <div class = "sidebar" id = "sidebar_right">
<?php if(isset($_SESSION["user"])) { ?>
        <div class="create_content_container">
            <form class="create_content_form" method="POST">
                <textarea name="createPost" placeholder="Create a new post..." id="create_content_textarea" maxlength="255"></textarea>
                <input name="createPostSubmit" type="submit" class="button" id="create_content_button">
            </form>
        </div>
<?php } ?>
    </div>
</body>
</html>