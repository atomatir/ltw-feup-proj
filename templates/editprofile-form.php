<?php
require_once "../database/session.php";
require_once "../database/db_user.php";

if(!isset($_SESSION['userID'])){
  header("Location: " . "../pages/login-page.php");
}


$profiledata = getUserDetailsProfile($_SESSION['userID']);

$profiledata['firstName'] = (!isset($profiledata['firstName'])) ? "First Name" : $profiledata['firstName'];
$profiledata['lastName'] = (!isset($profiledata['lastName'])) ? "Last Name" : $profiledata['lastName'];
?>


<script src="../scripts/editProfile.js"></script>
<div id="editprof-page">
    <h4>Edit Profile</h4>
    <div id="edit-user">
        <form id="editprof-form" enctype="multipart/form-data" action="../database/action_updateProfile.php" method="POST">
            <div id="profile-div">
              <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
              <input id="profile-upload" type="file" name="profilePic" accept="image/*" value="">
              <img id="profile_pic" src=<?php echo getUserImage($_SESSION['userID']);?>>
            </div>
            <input id="" type="text" name="firstName" value= <?php echo $profiledata['firstName'];?>  class="input" required>
            <input id="" type="text" name="lastName"  value= <?php echo $profiledata['lastName'];?> class="input"   required>
            <textarea name="descrip" maxlength="200" placeholder="Description" class="input"><?php 
            if(isset($profiledata['descrip']))
             echo $profiledata['descrip'];
            ?></textarea>
            <input id="saveprof-button" type="submit" value="Save" class="submit_button">
        </form>
    </div>
    <h4>Change Password</h4>
    <div id="change-pass">
        <form id="changepass-form" action="" method="">
            <input name="password" type="password" placeholder="Password" class="input" required>
            <input name="confPassword" type="password" placeholder="Confirm password" class="input" required
>
            <input id="changepass-button" type="submit" value="Change Password" class="submit_button">
        </form>
    </div>
</div>
<footer>