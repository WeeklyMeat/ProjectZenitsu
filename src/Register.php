<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Project Zenitsu</title>
    <meta name="description" content="bla">
    <meta name="author" content="WeeklyMeat">
    <link rel="stylesheet" type="text/css" href="style/Main.css">
    <link rel="stylesheet" type="text/css" href="style/Forms.css">
    <!-- <link rel="stylesheet" type="text/css" href="style/Darkmode.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<?php
    require "Autoloader.php";
    if(!isset($_SESSION))
        session_start();

    $dbc = new DatabaseConnection();
    $userContr = new UserContr(new UserModel($dbc));

?>
<body>
    <div class = "sidebar" id = "sidebar_left">
        <nav class="navbar">
            <ul class="nav-list"><?php

                if(isset($_SESSION["user"]))
                    header("Location: Index.php?mode=feed");

                else
                    NavbarView::outputNavOptionsLoggedOut();
            ?>
            </ul>
        </nav>
    </div>
    <section id = "content">
<?php       // PHP section

            if(isset($_POST["username"]) && $username = trim(htmlspecialchars($_POST["username"])))
                if(isset($_POST["email"]) && $email = trim(htmlspecialchars($_POST["email"])))
                    if(isset($_POST["password"]) && $password = trim(htmlspecialchars($_POST["password"])))
                        $isCreated = $userContr->createUser($username, $email, $password);

            if($isCreated ?? false)
                header("Location: Login.php");
            else
                $error = true;
?>
        <form action="Register.php" method="POST">
            <div class="formDiv"><input type="text" name="username" class="form" placeholder="Username"></div>
            <div class="formDiv"><input type="email" name="email" class="form" placeholder="Email"></div>
            <div class="formDiv"><input type="password" name="password" class="form" placeholder="Password"></div>
            <input type="submit" name="submit" id="submit">
        </form>
    </section>
    <div class = "sidebar" id = "sidebar_right">
    </div>
</body>
</html>