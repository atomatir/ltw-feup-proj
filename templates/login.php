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
        <div class="register_header">
            <nav id="login_menu">
                <ul>
                    <li><a href="../index.php" class="nav_button">Home</a></li>
                    <li><a href="signup-page.php" class="nav_signup">Sign Up</a></li>
                </ul>
            </nav>
            <img src="../images/logo-black.png" alt="Comoties Logo" class="register_logo">
        </div>
        <form id="login_form" method="post" action="">
            <input type="text" placeholder="Email Adress" class="input" required>
            <input type="password" placeholder="Password" class="input" required>
            <input id="login_button" type="submit" value="Login" class="submit_button" />
        </form>