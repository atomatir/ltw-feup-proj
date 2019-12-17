<?php 
require_once('../database/session.php');
require_once('../database/db_address.php');
require_once('../database/db_user.php');

if(!isset($_GET['placeID'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}

if(!isPlace($_GET['placeID'])) {
    header("Location: home-page.php");
    die();
}

$placeDetails = getPlaceDetails($_GET['placeID']);
$owner = getAddress($placeDetails['addressID']);

?>
<script src="../scripts/managePlace.js"></script>

<div id="manage-place">

    <h2>Manage Place #<?php echo $placeDetails['placeID']; ?></h2>
    <form id="manage-place-form" action="../database/action_update-place.php" method="POST">
        <div id="images">
            <div id="thumbnail-div">
                <input type="file" name="thumbnail" id="thumbnail" accept="image/png">
                <img id="thumbnail-pic" src="../images/places/default_thumb.png" alt="">
            </div>
        </div>
        <input name="placeID" type="hidden"  value="<?php echo $placeDetails['placeID'];?>">
        Name:<input name="name" class="input"  type="text" value="<?php echo $placeDetails['name']; ?>" >
        Description:<input name="descrip" class="input" type="text" value="<?php echo $placeDetails['descrip']; ?>">
        Price:<input name="price_by_night" class="input" type="number" value="<?php echo $placeDetails['price_by_night']; ?>" >
        Number of bedrooms:<input name="number_bedrooms" class="input" type="number" value="<?php echo $placeDetails['number_bedrooms']; ?>" >
        Number of bathrooms:<input name="number_bathrooms" class="input" type="number" value="<?php echo $placeDetails['number_bathrooms']; ?>" >
        Max number of guests:<input name="max_guests" class="input" type="number" value="<?php echo $placeDetails['max_guests']; ?>" >
        <input class="submit_button" id="signup_button" type="submit" value="Update">
    </form>
    <form id="delete-place-form" action="../database/action_delete-place.php" method="post">
        <input type="hidden" name="placeID" value="<?php echo $placeDetails['placeID'];?>">
        <input class="submit_button" id="delete_button" type="submit" value="Delete Place">
    </form>
</div>
<footer id="black-footer">