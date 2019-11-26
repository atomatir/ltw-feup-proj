<?php 
  include_once('../templates/auth-head.php');
  include_once('../templates/authentication.php');
  include_once('../templates/common.php');
  // Verify if user is logged in
  
  draw_login_header();
  draw_login();
  draw_footer();
