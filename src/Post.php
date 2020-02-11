<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Project Zenitsu</title>
    <meta name="description" content="bla">
    <meta name="author" content="WeeklyMeat">
    <link rel="stylesheet" type="text/css" href="style/general.css">
</head>
<?php
    require "Autoloader.php";

    $dbc = new DatabaseConnection();
    $postContr = new PostContr(new PostModel($dbc));
    $userContr = new UserContr(new UserModel($dbc));
?>
<body>
    <div class = "sidebar" id = "sidebar_left"></div>
    <div id = "content">
        <?php
            $posts = $postContr->getMultiplePosts(0, 20);
            for ($i = 0; $i < count($posts); $i++) {

                echo "<div class = 'post'>". $posts[$i]['content'] ."</div>";
            }
        ?>
    </div>
    <div class = "sidebar" id = "sidebar_right"></div>
</body>
</html>