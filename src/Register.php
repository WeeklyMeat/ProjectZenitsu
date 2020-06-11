<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="description" content="user registration">
    <meta name="author" content="WeeklyMeat">
    <meta name="keywords" content="Social, Media, Network, Friends, Opinions">
    <link rel="stylesheet" type="text/css" href="style/lightmode.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="stylesheet" type="text/css" href="style/forms.css">
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
        <nav class="nav">
            <ul class="nav_list"><?php

                if(isset($_SESSION["user"]))
                    header("Location: Index.php?mode=feed");

                else
                    NavbarView::outputNavOptionsLoggedOut();
            ?>
            </ul>
        </nav>
    </div>
    <section id="content">
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
        <form action="Register.php" method="POST" class="form_container">
            <div class="form_field_container"><input type="text" name="username" class="form_field" placeholder="Username"></div>
            <div class="form_field_container"><input type="email" name="email" class="form_field" placeholder="Email"></div>
            <div class="form_field_container"><input type="password" name="password" class="form_field" placeholder="Password"></div>
            <input type="submit" name="submit" value="Register" class="button">
        </form>
    </section>
    <div class="sidebar" id="sidebar_right">
    </div>
</body>
</html>