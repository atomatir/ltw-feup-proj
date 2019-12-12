<?php
// require_once 'session.php';
require_once 'db_user.php';

// if(!isset($_SESSION)){

// }

$userID = $_GET['userID'];

$result = getUserDetailsProfile($userID);

$result['isHost'] = isHost($userID);

$result['places'] = getOwnedPlaces($userID);


print_r($result);
