<?php
// require_once 'session.php';
require_once 'db_user.php';
require_once 'checkInput.php';

// if(!isset($_SESSION)){

// }

$userID = checkInput($_GET['userID']);

$result = getUserDetailsProfile($userID);

$result['isHost'] = isHost($userID);

$result['places'] = getOwnedPlaces($userID);


print_r($result);
