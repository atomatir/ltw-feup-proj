<li id="profile_button" class=nav_button>
<a class="profile" href="#">
    <img id="profile_img" src="./images/profile.png" alt="profile picture">
   <p><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></p>
  </a>
  <ul class="dropdown">
    <li><a class="nav_button" href="#">Edit Profile</a></li>
    <li><a class="nav_button" href="./database/action_logout.php">Log Out</a></li>
  </ul>
</li>