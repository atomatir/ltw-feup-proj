<?php


function geocode($address) {
        // url encode the address
    $address = urlencode($address);
    $key = "AIzaSyDDsaPVF5fz4KPsHL0VS9Rk5oYbtAhQEjo";
     
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$key}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
        
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        return false;
    }
}

function parseAddress($address) {

    $betweenCommas = explode(',', $address);

    // street and number
    $street = explode(' ', $betweenCommas[0]);
    $streetlen = sizeof($street);
    //street number
    $street_number = $street[$streetlen-1];
    // street name
    $street_name = '';
    for ($i = 0; $i < $streetlen -1; $i++) {
        $street_name .= ' ' . $street[$i];
    }

    //pcode and city
    $pcode_city = explode(' ', $betweenCommas[1]);
    //pcode
    $pcode = $pcode_city[1];
    //city name
    $city = '';
    for ($i = 2; $i < sizeof($pcode_city); $i++) {
        $city .= ' ' . $pcode_city[$i];
    }

    //country
    $country = $betweenCommas[2];

    return array($street_name, $street_number, $pcode, $city, $country);
}

    $host_place['name'] = $_POST['name'];
    $host_place['desc'] = $_POST['desc'];
    $host_place['n_beds'] = $_POST['bedrooms'];
    $host_place['n_baths'] = $_POST['bathrooms'];
    $host_place['n_guests'] = $_POST['max_guests'];
    $host_place['price'] = $_POST['price_by_night'];
    $host_place['street'] = $_POST['address'];
    $host_place['str_no'] = $_POST['street_number'];
    $host_place['pcode'] = $_POST['postal_code'];
    $host_place['city'] = $_POST['city'];
    $host_place['state'] = $_POST['state'];
    $host_place['country'] = $_POST['country'];
    $host_place['region'] = $_POST['region'];

    $hostAddress = $_POST['address'] . "+" . $_POST['street_number'] . "+" . $_POST['postal_code'] . "+" . $_POST['city'] . "+" . $_POST['state'] . "+" . $_POST['country'];

    $responseAddress = geocode($hostAddress);

    include_once('../templates/header.php');

    // address ok
    if(!empty($responseAddress)) {  

        $addressArr = parseAddress($responseAddress[2]);
        print_r($addressArr);
         echo "<div id='confirm-host-wrapper'>
                <h2 id=''>Is this the right address?</h2>
                <span id='google-address'>";
        echo $responseAddress[2];
        echo '</span><div id="button-line">
                <form action="../database/action_host.php" method="post" >
                    <input    type="hidden" name="name" value=" <?php echo $_POST[\'name\']; ?> " >
                    <input    type="hidden" name="desc" value=" <?php echo $_POST[\'desc\']; ?> ">
                    <input    type="hidden" name="bedrooms"  value=" <?php echo $_POST[\'bedrooms\']; ?> " >
                    <input    type="hidden" name="bathrooms"  value=" <?php echo $_POST[\'bathrooms\']; ?> ">
                    <input    type="hidden" name="max_guests"  value=" <?php echo $_POST[\'max_guests\']; ?> " >
                    <input    type="hidden" name="price_by_night"value=" <?php echo $_POST[\'price_by_night\']; ?> " >
                    <input    type="hidden" name="latitude"  value=" <?php echo $responseAddress[0]; ?> " >
                    <input    type="hidden" name="longitude" value=" <?php echo $responseAddress[1]; ?> " >   
                    <input    type="hidden" name="address"   value=" <?php echo $addressArr[0]; ?> " >
                    <input    type="hidden" name="street_number" value=" <?php echo $addressArr[1]; ?> ">
                    <input    type="hidden" name="postal_code"value=" <?php echo $addressArr[2]; ?> " >
                    <input    type="hidden" name="city"  value=" <?php echo $addressArr[3]; ?> " >
                    <input    type="hidden" name="state" value="  " >
                    <input    type="hidden" name="country" value=" <?php echo $addressArr[4]; ?> ">
                    <input    type="hidden" name="region" value=" ">
                    <input class="input host-button" type="submit" value="Yes, confirm">
                </form>
                <button class="input host-button" onClick="location.href=\"{$_SERVER[\'HTTP_REFERER\']}\"">No, try again</button></div></div><footer id="black-footer">';

    }
    // did not found address
    else {
        echo "<div id='confirm-host-wrapper'>
                <h2>We couldn't find the address you provided</h2>
                <div id='button-line'>
                <button class='input host-button' onClick='location.href=\"{$_SERVER['HTTP_REFERER']}\"' >Try Again</button>
                <button class='input host-button' onClick='location.href=\"profile-page.php\"' >Go to Profile</button></div></div><footer>";
    }

    include_once('../templates/footer.php');

?>