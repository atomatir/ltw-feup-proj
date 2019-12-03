<?php
require_once 'db_user.php';


$arr = array();
$email = $_POST['email'];
$password = $_POST['password'];

if(checkLogin($email,$password,$arr)){
  updateLoginTime($email);
  $_SESSION['username'] = $email;
  $_SESSION['firstName'] = $arr['firstName'];
  $_SESSION['lastName'] = $arr['lastName'];
  $_SESSION['userid'] = $arr['userid'];

  echo 'Logged in';
  header('Location: ' . '../index.php');
} else{
  echo 'Logged in failed';
}
