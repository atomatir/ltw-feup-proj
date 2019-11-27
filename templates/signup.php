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
    <header>
        <nav id="login_menu">
            <ul>
                <li><a href="../index.php" class="nav_button">Home</a></li>
                <li><a href="../pages/login-page.php" class="nav_button">Login</a></li>
            </ul>
        </nav>
        <img id="signup_logo" src="../images/logo-white.png" alt="Comoties Logo" class="register_logo">
    </header>
    <div id="outer-sign-up">
        <form id="login_form" method="POST" action="../database/signup_action.php">
        
            <label for="name" id="name">
                <input type="text" placeholder="First Name" class="input"   name="firstName" required>
                <input type="text" placeholder="Last Name" class="input"    name="lastName" required>
            </label>

            <label for="email" id="email-input">
                <input type="email" placeholder="Email Address" class="input" name="email"    required>
            </label>

            <label for="password">
                <input type="password" placeholder="Password" class="input" name="password" required>
            </label>

            <label for="date">
                <input type="date" class="input"                            name="birthday" required>
            </label>

            <label for="phone-number">
                <input type="tel" placeholder="Phone Number (optional)" maxlength="9" name="phonenumber" class="input">
            </label>

            <label id="signup_button" for="signup">
                <input id="signup_button_input" type="submit" value="Sign Up" />
            </label>
            
        </form>

    </div>

    