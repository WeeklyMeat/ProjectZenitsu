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

    if(isset($_SESSION["user"]))
        header("Location: Index.php?mode=feed");

    $dbc = new DatabaseConnection();
    $userContr = new UserContr(new UserModel($dbc));
?>
<body>
    <div class = "sidebar" id = "sidebar_left">
        <nav class="navbar">
            <ul class="nav-list"><?php
                    
                NavbarView::outputNavOptionsLoggedOut();
                $userContr->login("WeeklyMeat", "1234");
            ?>
            </ul>
        </nav>
    </div>
    <section id = "content">

    </section>
    <div class = "sidebar" id = "sidebar_right">
    </div>
</body>
</html>