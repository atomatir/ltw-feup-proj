<?php

require_once '../database/db_reservations.php';
require_once '../database/session.php';
require_once '../templates/reservations.php';

if(!isset($_GET['placeID'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}

if(!isPlace($_GET['placeID'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    die();
}

$reservations = getReservationsPlace($_GET['placeID']);


include_once('../templates/header.php');

echo '<div id="property-list-all">';

if (empty($reservations)) {
    echo '<h1 style="text-align:center;margin-top: 10vh;">Your place has no reservations</h1>';
}else{

    foreach ($reservations as $val) {
        makeReservCard($val);
    }
}
echo '</div><footer>';

include_once('../templates/footer.php');

?>