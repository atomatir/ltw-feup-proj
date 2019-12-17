<?php
require_once "session.php";
require_once "db_user.php";
require_once "checkInput.php";


if(!isset($_SESSION['userID']) && !isset(checkInput($_POST['userID']))){
  http_response_code(403);
  die();
}

$places = getOwnedPlaces(checkInput($_POST['userID']));




// http_response_code(200);

echo json_encode($places);

// echo "cona";