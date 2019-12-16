<?php

require_once "session.php";
require_once "db_user.php";

// if(isset($_SESSION['userID'])){
//   header("Location:" . );
// }
$arr = array(
  "profilePic" => $_FILES['profilePic']['tmp_name'],
  "firstName"  => $_POST['firstName'],
  "lastName"   => $_POST['lastName'],
  "descrip"    => $_POST['descrip'],
  "file"       => is_uploaded_file($_FILES['profilePic']['tmp_name']),
  "userID"     => $_SESSION['userID']
);

if(is_uploaded_file($_FILES['profilePic']['tmp_name'])){
  // echo "../images/users/user_" . $_SESSION['userID'] . ".png";
  copy($_FILES['profilePic']['tmp_name'],"../images/users/user_" . $_SESSION['userID'] . ".png");
}

$arr['sucess'] = updateUser($arr);

if($arr['sucess']){
  $_SESSION['firstName'] = $arr['firstName'];
  $_SESSION['lastName'] = $arr['lastName'];
}

echo json_encode($arr);


