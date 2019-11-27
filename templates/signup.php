<!DOCTYPE html>
<html>

<head>
    <title>Comoties</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, heigth=device-heigth, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body id="login_body">
    <div class="login_header">
        <nav id="login_menu">
            <ul>
                <li><a href="signup.php" class="nav_button">Home</a></li>
                <li><a href="signup.php" class="nav_signup">Sign Up</a></li>
            </ul>
        </nav>
        <img id="register_logo" src="../images/logo-black.png" alt="Comoties Logo">
    </div>
    <form id="login_form" method="POST" action="../database/signup_action.php">
        <input type="text" placeholder="Email Adress" class="input" name="email"    required>
        <input type="password" placeholder="Password" class="input" name="password" required>
        <input type="text" placeholder="First Name" class="input"   name="firstName" required>
        <input type="text" placeholder="Last Name" class="input"    name="lastName" required>
        <input type="date" class="input"                            name="birthday" required>
        <input type="number" placeholder="Phone Number (optional)" maxlength="9" name="phonenumber" class="input">
        <input id="signup_button" type="submit" value="Sign Up" />
    </form>