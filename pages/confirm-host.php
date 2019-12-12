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

    $hostAddress = $host_place['street'] . "+" . $host_place['str_no'] ."+".$host_place['pcode']."+".$host_place['city'];

    $responseAddress = geocode($hostAddress);

    include_once('../templates/header.php');

    if(!empty($responseAddress)) {  
        echo "<div id='confirm-host-wrapper'>
                <h2 id=''>Is this the right address?</h2>
                <span id='google-address'>";
        $googleAddress = $responseAddress[2];
        echo $googleAddress;
        echo "</span><div id='button-line'><button class='input host-button'>Yes, confirm</button>
                <button class='input host-button' onClick='location.href=\"{$_SERVER['HTTP_REFERER']}\"'>No, try again</button></div></div><footer id='black-footer'>";

    }
    else {
        echo "<div id='confirm-host-wrapper'>
                <h2>We couldn't find the address you provided</h2>
                <div id='button-line'>
                <button class='input host-button' onClick='location.href=\"{$_SERVER['HTTP_REFERER']}\"' >Try Again</button>
                <button class='input host-button' onClick='location.href=\"profile-page.php\"' >Go to Profile</button></div></div><footer>";
    }

    include_once('../templates/footer.php');

?>