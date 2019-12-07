<?php require_once '../database/session.php' ?>

<!DOCTYPE html>
<html>

<head>
    <title>Comoties</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../scripts/signup_validator.js"></script>
</head>

<body id="signup_body">
    <header>
        <nav class="menu">
            <ul>
                <li><a href="../index.php" class="nav_button">Home</a></li>
                <li><a href="../pages/login-page.php" class="nav_button">Login</a></li>
            </ul>
        </nav>
        <img id="signup_logo" src="../images/logo-white.png" alt="Comoties Logo" class="register_logo">
    </header>
    
    <div id="signup_form">
        <form method="POST" action="../database/action_signup.php">
            <input name="firstName"   type="text"     placeholder="First Name"    class="input" required>
            <input name="lastName"    type="text"     placeholder="Last Name"     class="input" required>
            <input name="email"       type="email"    placeholder="Email Address" class="input" required>
            <input name="password"    type="password" placeholder="Password"      class="input" required>
            <input name="birthday"    type="date"                                 class="input" required>
            <input name="phonenumber" type="text"     placeholder="Phone Number"  class="input" required>
            <input id="signup_button" type="submit"   value="Sign Up"             class="submit_button"/>
        </form>
    </div>