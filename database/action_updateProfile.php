<?php

require_once "session.php";
$response = array();


$arr = array(
  "profilePic" => $_FILES['profilePic']['name'],
  "firstName"  => $_POST['firstName'],
  "lastName"   => $_POST['lastName'],
  "descrip"    => $_POST['descrip']
);

if(is_uploaded_file($_FILES['profilePic']['tmp_name'])){
  echo "../images/users/user_" . $_SESSION['userID'] . ".png";
  echo copy($_FILES['profilePic']['tmp_name'],"../images/users/user_" . $_SESSION['userID'] . ".png");
}

















// print_r($arr);


