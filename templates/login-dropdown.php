<li>
  <div id="account-button-div">
    <a id="account-button" href="./pages/signup-page.php">
      <img id="profile-pic" src="./images/guests.png" alt="profile picture">
      <span id="profile-name"><?php echo $_SESSION['firstName'] . $_SESSION['lastName'];?></span>
    </a>
    <a id="dropdown-arrow-button" href="./database/action_logout.php">
      <img id="right-arrow-profile" src="./images/right-arrow.png" alt="right arrow">
    </a>
  </div>
</li>