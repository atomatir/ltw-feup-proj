<?php

require_once "../database/session.php";

if(!isset($_SESSION['username'])){
  header("Location: ./login-page.php");
  die();
}
?>


<script src="../scripts/countries.js" referer></script>
<div id="outer-place-form">
<form id="place-form" action="../database/createPlace.php" method="post">
  <img id="profile_img" src="../images/Imagem1.png" alt="profile picture">
  <div id="place-div">
    <input    id="place-name"   type="text"   name="name"                class="input" placeholder="Name">
    <textarea id="place-desc" name="descrip" maxlength="500" class="input" placeholder="Description"></textarea>
    <div id="input-line">
        <input    id="place-beds"   type="number" name="number_bedrooms"       min="0" class="input" placeholder="# Bedrooms">
        <input    id="place-baths"  type="number" name="number_bathrooms"      min="0" class="input" placeholder="# Bathrooms">
        <input    id="place-guests" type="number" name="max_guests"     min="1" max="20" class="input" placeholder="Max # of guests">
        <input    id="place-price"  type="number" name="price_by_night" min="1" max="200" class="input" placeholder="€ / Day">
    </div>
    
  </div>
  <div id='address-div'>
    <input id="place-lat"   type="number" name="latitude"      class="input" placeholder="Latitude(?)">
	<input id="place-long"  type="number" name="longitude"     class="input" placeholder="Longitude(?)">  
	<div class="input-line">
		<input id="place-street" type="text"   name="address"       class="input" placeholder="Street name">
		<input id="place-num"   type="number"  name="street_number" class="input" placeholder="No.">
		<input id="place-pcode"  type="text"   name="postal_code"   class="input" placeholder="Postal Code">
	</div>



    <div id='add1' class="input-line">
    </div>

    <div id='add2' class="input-line">
    </div>

  </div>
	<input class="submit_button" type="submit" value="Submit" class="submit_button" />

</form>
</div>
<footer> 