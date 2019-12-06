<li id="profile_button" class="nav_button">
  <div class="profile">
    <img id="profile_img" src="./images/guests.png" alt="profile picture">
    <span id="name"><?php echo $_SESSION['firstName'] . $_SESSION['lastName']; ?></span>

    <ul class="dropdown">
      <li><a href="#">Profile</a></li>
      <li><a href="./database/action_logout.php">Log Out</a></li>
    </ul>
  </div>
</li>