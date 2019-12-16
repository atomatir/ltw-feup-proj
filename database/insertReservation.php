<?php
require_once "session.php";
require_once "db_reservations.php";


$response = array(
  "sucess" => FALSE
);

if(!isset($_SESSION['userID'])){
  echo json_encode($response);
  die();
}

$_POST['userID'] = $_SESSION['userID'];

$response = insertReservation($_POST);
$response['sucess'] = TRUE;

echo json_encode($response);
?>