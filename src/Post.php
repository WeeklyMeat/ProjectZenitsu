<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Post</title>
    <meta name="description" content="bla">
    <meta name="author" content="WeeklyMeat">
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
    $postContr = new PostContr(new PostModel($dbc));
    $commentContr = new CommentContr(new CommentModel($dbc));

    if(isset($_GET["post"]) && $id = intval(trim(htmlspecialchars($_GET["post"])))) {
        $post = $postContr->getPostByID($id)[0];
        if(empty($post))
            header("Location: Index.php");
    }
    else
        header("Location: Index.php");

    if(isset($_POST["createComment"]) && strlen($_POST["createComment"]) < 256 && isset($_POST["createCommentSubmit"])) {

        $commentContent = trim(htmlspecialchars($_POST["createComment"]));
        $commentContr->createComment($commentContent, $_SESSION["id"], $post["id_post"]);
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
    <section id = "content">
<?php       // PHP section

                $postView = new PostView($post);
                $postView->outputSinglePost();

                $comments = $commentContr->getCommentsByPost($post["id_post"]);

                $commentView = new CommentView($comments);
                $commentView->outputComments();
?>
    </section>
    <div class = "sidebar" id = "sidebar_right">
<?php if(isset($_SESSION["user"])) { ?>
        <div class="create_content_container">
            <form class="create_content_form" method="POST">
                <textarea name="createComment" placeholder="Comment this post..." id="create_content_textarea" maxlength="255"></textarea>
                <input name="createCommentSubmit" type="submit" class="button" id="create_content_button">
            </form>
        </div>
<?php } ?>
    </div>
</body>
</html>