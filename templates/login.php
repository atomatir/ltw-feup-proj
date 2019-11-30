<?php require_once '../database/connection.php' ?>

   <!DOCTYPE html>
    <html>

    <head>
        <title>Comoties</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/register.css">
        <link rel="stylesheet" href="../css/footer.css">
    </head>

    <body id="login_body">
        <header>
            <nav id="login_menu">
                <ul>
                    <li><a href="../index.php" class="nav_button">Home</a></li>
                    <li><a href="../pages/signup-page.php" class="nav_signup">Sign Up</a></li>
                </ul>
            </nav>
            <img src="../images/logo-black.png" alt="Comoties Logo" class="register_logo">
        </header>

        <div id="outer-login">
            <form id="login_form" method="POST" action="../database/action_login.php">
                <input type="email" placeholder="Email Address" class="input" name="email"   required>
                <input type="password" placeholder="Password" class="input"   name="password"   required>
                <input id="login_button" type="submit" value="Login" class="submit_button" />
            </form>
        </div>

