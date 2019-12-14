<li id="profile_button" class="">
  <a class="profile" href=<?php echo "../pages/profile-page.php?userID=" . $_SESSION['userID'];?>>
    <img id="profile_img" src="../images/profile.png" alt="profile picture">
    <p><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></p>
  </a>

  <div class="dropdown">
    <a href="../templates/editprofile-form.php" class="nav_button">Edit Profile</a>
   <a href="../database/action_logout.php" class="nav_button">Log Out</a>
</div>
</li>