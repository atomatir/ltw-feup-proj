<div id="outer-place-form">
<form id="place-form" action="../pages/confirmHost.php" method="post">
  <img id="profile_img" src="../images/Imagem1.png" alt="profile picture">
  <div id="place-div">
    <input    id="place-name"   type="text"   name="name"                class="input" placeholder="Name">
    <textarea id="place-desc" name="desc" maxlength="500" cols="5" rows="5" class="input" placeholder="Description"></textarea>
    <div id="input-line">
        <input    id="place-beds"   type="number" name="bedrooms"       min="0" class="input" placeholder="# Bedrooms">
        <input    id="place-baths"  type="number" name="bathrooms"      min="0" class="input" placeholder="# Bathrooms">
        <input    id="place-guests" type="number" name="max_guests"     min="1" max="20" class="input" placeholder="Max # of guests">
        <input    id="place-price"  type="number" name="price_by_night" min="1" max="200" class="input" placeholder="€ / Day">
    </div>
    
  </div>
  <div id='address-div'>
    <input id="place-lat"   type="number" name="latitude"      class="input" placeholder="Latitude(?)">
	<input id="place-long"  type="number" name="longitude"     class="input" placeholder="Longitude(?)">    
	<div id="input-line">
		<input id="place-street" type="text"   name="address"       class="input" placeholder="Street name">
		<input id="place-num"   type="number" name="street_number" class="input" placeholder="No.">
	</div>
	<div id="input-line">
		<input id="place-pcode"  type="text" name="postal_code"   class="input" placeholder="Postal Code">
		<input id="place-city"  type="text" name="city"   class="input" placeholder="City">
	</div>
	<div id="input-line">
		<input id="place-state"  type="text" name="state"   class="input" placeholder="State">
		<input id="place-country"  type="text" name="country"   class="input" placeholder="Country">
		<input id="place-region"  type="text" name="region"   class="input" placeholder="Region">
	</div>

	<input id="signup_button" type="submit" value="Submit" class="submit_button" />

  </div>

</form>
</div>
<footer> 