<?php
    require_once('../database/db_search.php');
    require_once('../templates/property-list.php');
    require_once('../database/db_cities.php');
    require_once('../database/db_address.php');

    include_once('../templates/header.php');

    // $_GET has region, countries, states, cityID, date-in, date-out, n-guests, min-price, max-price

    $places = searchPlaces($_GET);

    if (empty($places)) {
        echo '<h1 style=" padding: 10vh 7vw; height: 80vh; ">We are very sorry to say there is nothing available in the days you asked</h1>';
    }
    else {
        echo "<div id='property-list-all'> ";
        foreach($places as $place) {
            $address = getAddress($place['address']);

            $location = getCountryFromCity($address['cityID']);

            propertyElem($place['id'], $place['name'], 4.8, $place['desc'], $place['bed'], $place['bath'], $place['guests'], $place['price'], $location);
        }
    }

    echo "</div><footer id='black-footer'>";
    include_once('../templates/footer.php');
?>