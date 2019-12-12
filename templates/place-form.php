<?php

require_once "../database/session.php";

if(!isset($_SESSION['username'])){
  header("Location: ./login-page.php");
  die();
}

?>


<form id="place-form" action="" method="post">
  <img id="profile_img" src="../images/Imagem1.png" alt="profile picture">
  <div id="place-div">
    <input    id="place-name"   type="text"   name="name"                class="input" placeholder="Name" required>
    <textarea id="place-desc"   name="desc" maxlength="450" cols="10" rows="10" class="input" placeholder="Description" required></textarea>
    <input    id="place-beds"   type="number" name="number_bedrooms"       min=0 class="input" placeholder="Bedrooms" required>
    <input    id="place-baths"  type="number" name="number_bathrooms"      min=0 class="input" placeholder="Bathrooms" required>
    <input    id="place-guests" type="number" name="max_guests"     min=1 class="input" placeholder="Max guests" required>
    <input    id="place-price"  type="number" name="price_by_nigth" min=0 class="input" placeholder="€/Night" required>
  </div>
  <div id='address-div'>
    <input id="place-lat"   type="number" name="latitude"      class="input" placeholder="Latitude(?)" required>
    <input id="place-long"  type="number" name="longitude"     class="input" placeholder="Longitude(?)" required>
    <input id="place-street" type="text"   name="address"       class="input" placeholder="Street name" required>
    <input id="place-num"   type="number" name="street_number" class="input" placeholder="No." required>
    <input id="place-pcode"  type="text" name="postal_code"   class="input" placeholder="Postal Code" required>

  </div>
  <button type="submit">Submit Place</button>
</form>