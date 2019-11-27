<!DOCTYPE html>
<html>

<head>
    <title>Comoties</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body id="signup_body">
    <div class="register_header">
        <nav id="login_menu">
            <ul>
                <li><a href="../index.php" class="nav_button">Home</a></li>
                <li><a href="login-page.php" class="nav_button">Login</a></li>
            </ul>
        </nav>
        <img id="signup_logo" src="../images/logo-white.png" alt="Comoties Logo" class="register_logo">
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