
<h2>CREATING A NEW PLACE</h2>
<form id="place-form" action="" method="post">
  <div id="place-div">
    <input type="text" name="title" id="place-title" class="input" placeholder="Name">
    <textarea name="desc" id="place-desc" maxlength="450" cols="10" rows="10" class="input" placeholder="Description"></textarea>
    <input type="number" name="bathrooms" id="place-bathrooms" min=0 class="input" placeholder="# Bathrooms">
    <input type="number" name="bedrooms" id="place-bedrooms" min=0 class="input" placeholder="# Bedrooms">
    <input type="number" name="max_guests" id="place-guests" min=1 class="input" placeholder="Max # of guests">
    <input type="number" name="price_by_nigth" id="place-price" min=0 class="input" placeholder="Price p/Night">
  </div>
  <div id='address-div'>
    <input type="number" name="latitude" id="place-lat" class="input" placeholder="Latitude(?)">
    <input type="number" name="longitude" id="place-long" class="input"placeholder="Longitude(?)">
    <input id="street-name" type="text" name="address" id="place-address" class="input" placeholder="Street name">
    <input id="street-no" type="number" name="street_number" id="place-street" class="input" placeholder="No.">
    <input type="number" name="postal_code" id="place-long" class="input" placeholder="Postal Code">

  </div>

</form>