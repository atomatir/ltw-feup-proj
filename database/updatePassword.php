<?php
require_once "session.php";
require_once "db_user.php";

$response = array(
  "missValues" => FALSE,
  "missLogin" => FALSE
);

if(!isset($_SESSION['userID'])){
  $response['missLogin'] = TRUE;
  echo json_encode($response);
  die();
}

if(!isset($_POST["oldpassword"]) || !isset($_POST["password"]) || !isset($_POST["confPassword"])){
  $response['missValues'] = TRUE;
  $response['values'] = $_POST;
  echo json_encode($response);
  die();
}

$response['sucess'] = updatePassword($_SESSION['userID'],$_POST);

echo json_encode($response);
die();

