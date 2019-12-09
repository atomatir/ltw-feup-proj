<li id="profile_button" class="nav_button">
  <a class="profile" href="../pages/profile-page.php">
    <img id="profile_img" src="../images/profile.png" alt="profile picture">
    <p><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></p>
  </a>

  <div class="dropdown">
    <a href="#" class="nav_button">Edit Profile</a>
   <a href="../database/action_logout.php" class="nav_button">Log Out</a>
</div>
</li>