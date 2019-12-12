<?php
    require_once('../database/db_search.php');
    require_once('../templates/property-list.php');

    $search_args['city'] = $_GET['city'];
    $search_args['date_in'] = $_GET['date-in'];
    $search_args['date_out'] = $_GET['date-out'];
    $search_args['n_guests'] = $_GET['n-guests'];
    $search_args['min_price'] = $_GET['min-price'];
    $search_args['max_price'] = $_GET['max-price'];



    include_once('../templates/header.php');
    $places = searchPlaces($search_args);

    echo '<h3>' . sizeof($places) . '</h3>';

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