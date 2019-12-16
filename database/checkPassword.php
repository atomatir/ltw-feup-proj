<?php 
require_once "session.php";
require_once "db_user.php";

$response=array(
  "Ispass" => FALSE
);

if(!isset($_SESSION['userID']) || !isset($_POST['pass'])){
  echo json_encode($response);
  die();
}

$response['Ispass'] = checkPass($_SESSION['userID'],$_POST['pass']);

echo json_encode($response);
