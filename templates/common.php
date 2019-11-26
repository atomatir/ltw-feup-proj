<?php function draw_header()
{
  /**
   * 
   */ ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comoties</title>
    <link rel="stylesheet" href="css/head.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/home-form.css" type="text/css">
  </head>

  <body>
    <header id="top-bar">
      <a id="logo-img" href=""><img src="../images/Logo Black (2).png" alt="Comoties Logo"></a>
      <nav id="menu">
        <ul>
          <li><a href="">Home</a></li>
          <li><a href="">Help</a></li>
          <li><a href="">Become a Host</a></li>
          <li><a href="">€ EUR</a></li>
          <li><a href="">Sign Up</a></li>
          <li><a href="/pages/login-page.php">Login</a></li>
        </ul>
      </nav>
    </header>
  <?php } ?>


  <?php function draw_footer()
  {
    /**
     * Draws the footer for all pages.
     */ ?>
    <footer id="down-bar">
      &copy;2019 Filipe Ferreira | Henrique Freitas | Rita Mota @ FEUP
    </footer>
  </body>

  </html>
<?php } ?>