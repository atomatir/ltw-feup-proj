  <?php require_once './database/connection.php' ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Comoties</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/range-slider.css">
    <link rel="stylesheet" href="css/list-advert.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="./scripts/dropdown.js" defer></script> -->
  </head>

  <body>
    <header id="top-bar">
      <a id="logo-img" href=""><img src="images/logo-black.png" alt="Comoties Logo"></a>
      <nav class="menu">
        <ul>
          <li><a id="home-button"     href="" class="nav_button">Home</a></li>
          <li><a id="help-button"     href="" class="nav_button">Help</a></li>
          <li><a id="host-button"     href="" class="nav_button">Become a Host</a></li>
          <li><a id="currency-button" href="" class="nav_button">€ EUR</a></li>
         
          <?php if (isset($_SESSION['username'])) { 
            include_once 'login-dropdown.php';
           } else { ?>
            <li><a id="signup-button" href="pages/signup-page.php" class="nav_signup">Sign Up</a></li>
            <li><a id="login-button" href="pages/login-page.php"   class="nav_button">Login</a></li>
          <?php } ?>
        </ul>
      </nav>
    </header>
