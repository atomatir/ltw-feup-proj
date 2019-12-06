<?php require_once '../database/connection.php' ?>

   <!DOCTYPE html>
    <html>

    <head>
        <title>Comoties</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body id="login_body">
        <header>
            <nav class="menu">
                <ul>
                    <li><a href="../index.php" class="nav_button">Home</a></li>
                    <li><a href="../pages/signup-page.php" class="nav_signup">Sign Up</a></li>
                </ul>
            </nav>
            <img src="../images/logo-black.png" alt="Comoties Logo" class="register_logo">
        </header>

        <div id="login_form">
            <form method="POST" action="../database/action_login.php">
                <input name="email"      type="email"    placeholder="Email Address" class="input" required>
                <input name="password"   type="password" placeholder="Password"      class="input" required>
                <input id="login_button" type="submit"   value="Login"               class="submit_button" />
            </form>
        </div>

