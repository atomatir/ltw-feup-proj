
<form id="place-form" action="" method="post">
  <img id="profile_img" src="../images/Imagem1.png" alt="profile picture">
  <div id="place-div">
    <input    id="place-name"   type="text"   name="title"                class="input" placeholder="Name">
    <textarea id="place-desc" name="desc" maxlength="450" cols="10" rows="10" class="input" placeholder="Description"></textarea>
    <input    id="place-beds"   type="number" name="bedrooms"       min=0 class="input" placeholder="# Bedrooms">
    <input    id="place-baths"  type="number" name="bathrooms"      min=0 class="input" placeholder="# Bathrooms">
    <input    id="place-guests" type="number" name="max_guests"     min=1 class="input" placeholder="Max # of guests">
    <input    id="place-price"  type="number" name="price_by_nigth" min=0 class="input" placeholder="$/Night">
  </div>
  <div id='address-div'>
    <input id="place-lat"   type="number" name="latitude"      class="input" placeholder="Latitude(?)">
    <input id="place-long"  type="number" name="longitude"     class="input" placeholder="Longitude(?)">
    <input id="place-street" type="text"   name="address"       class="input" placeholder="Street name">
    <input id="place-num"   type="number" name="street_number" class="input" placeholder="No.">
    <input id="place-pcode"  type="text" name="postal_code"   class="input" placeholder="Postal Code">

  </div>

</form>