<?php
require_once 'db_user.php';


$arr = array();
$email = $_POST['email'];
$password = $_POST['password'];

$response = FALSE;

if(checkLogin($email,$password,$arr)){
  updateLoginTime($email);
  $_SESSION['username'] = $email;
  $_SESSION['firstName'] = $arr['firstName'];
  $_SESSION['lastName'] = $arr['lastName'];
  $_SESSION['userID'] = $arr['userID'];

  // echo 'Logged in';
  $response = TRUE;
  // header('Location: ' . '../index.php');
  // header('Location: ' . $_SERVER['HTTP_REFERER']);
} else{
  $response = FALSE;
}

echo json_encode(array("response"=>$response));
