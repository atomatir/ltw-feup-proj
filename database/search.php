<?php
    require_once('db_search.php');

    $search_args['city'] = $_GET['city'];
    $search_args['date_in'] = $_GET['date-in'];
    $search_args['date_out'] = $_GET['date-out'];
    $search_args['n_guests'] = $_GET['n-guests'];
    $search_args['min_price'] = $_GET['min-price'];
    $search_args['max_price'] = $_GET['max-price'];



    include_once('../templates/header.php');
    echo '<br><br><br><br><br><br><br><br><br><h4>'. searchPlace($search_args) . '</h4>';

?>