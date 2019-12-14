<?php
    require_once('../database/db_search.php');
    require_once('../templates/property-list.php');

    include_once('../templates/header.php');

    // $_GET has region, countries, states, cityID, date-in, date-out, n-guests, min-price, max-price
    $places = searchPlaces($_GET);

    echo '<br><br><br><br><h3>' . sizeof($places) . '</h3>';

    print_r($_GET);

    if (empty($places)) {
        echo '<h1 style=" padding: 10vh 7vw; height: 80vh; ">We are very sorry to say there is nothing available in the days you asked</h1>';
    }
    /*
        if array empty: echo nothing to show you

        loop through searchPlaces array
        propertyElem(array[index] -> id, name, rating, specs)

    */

    include_once('../templates/footer.php');
?>