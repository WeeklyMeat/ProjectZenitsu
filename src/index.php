<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Project Zenitsu</title>
    <meta name="description" content="bla">
    <meta name="author" content="WeeklyMeat">
    <link rel="stylesheet" type="text/css" href="style/general.css">
    <link rel="stylesheet" type="text/css" href="style/darkmode.css">
</head>
<?php
    require "Autoloader.php";

    $dbc = new DatabaseConnection();
    $postContr = new PostContr(new PostModel($dbc));
?>
<body>
    <div class = "sidebar" id = "sidebar_left"></div>
    <div id = "content">
        <?php
        
            $post = $postContr->getMultiplePosts(0, 10);
            $postView = new postView($post);
            $postView->outputPosts();
        ?>
    </div>
    <div class = "sidebar" id = "sidebar_right"></div>
</body>
</html>