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
                <li><a href=".../ltw-feup-proj/index.php" class="nav_button">Home</a></li>
                <li><a href="login-page.php" class="nav_button">Login</a></li>
            </ul>
        </nav>
        <img id="signup_logo" src="../images/logo-white.png" alt="Comoties Logo" class="register_logo">
    </div>
    <form id="signup_form" method="post" action="">
        <input type="text" placeholder="Email Adress" class="input" required>
        <input type="password" placeholder="Password" class="input" required>
        <input type="text" placeholder="First Name" class="input" required>
        <input type="text" placeholder="Last Name" class="input" required>
        <input type="date" class="input" required>
        <input type="number" placeholder="Phone Number (optional)" maxlength="9" class="input">
        <input id="signup_button" type="submit" value="Login" class="submit_button"/>
    </form>