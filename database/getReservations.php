<?php
require_once "db_reservations.php";

$response = array(
  "sucess" => FALSE
);

if(!isset(checkInput($_POST['placeID']))){
  echo json_encode($response);
  die();
}




$response['result'] = getReservationsInfo(checkInput($_POST['placeID']));

$response['sucess'] = TRUE;

echo json_encode($response);