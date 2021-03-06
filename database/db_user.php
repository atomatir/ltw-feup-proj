<?php

require_once("connection.php");

function searchUser($email){
  global $db;
  $stmnt = $db->prepare("SELECT email FROM User WHERE User.email = ?");
  $stmnt->execute(array($email));
  $result = $stmnt->fetchAll();
  return sizeof($result);
}

function isUser($userID){
  global $db;
  $stmnt = $db->prepare("SELECT userID FROM User WHERE User.userID = ?");
  $stmnt->execute(array($userID));
  $result = $stmnt->fetchAll();
  return sizeof($result);
}

function checkPass($userID,$pass){
  if(!isset($userID) || !isset($pass)) return FALSE;
  if(!isUser($userID)) return FALSE;

  global $db;

  $stmnt=$db->prepare("SELECT password as pass FROM User WHERE User.userID = ?");
  $stmnt->execute(array($userID));
  $result = $stmnt->fetch();


  return password_verify($pass,$result['pass']);
}

function updatePassword($userID,$arr){
  if(!isset($userID) || !isset($arr["oldpassword"]) || !isset($arr["password"]) || !isset($arr["confPassword"])) return FALSE;
  if(!checkPass($userID,$arr['oldpassword'])) return FALSE;
  if($arr['password'] != $arr['confPassword']) return FALSE;

  global $db;

  $options = ['cost' => 12];
  $pass = password_hash( $arr['password'], PASSWORD_DEFAULT, $options);

  $stmnt = $db->prepare("UPDATE User SET password = ? WHERE userID= ? ");
  
  
  
  return $stmnt->execute(array($pass,$userID));
}


function createUser($arr){
  if(searchUser($arr['email']) != 0) {
    return FALSE;
  }
  global $db;

  $insert = "INSERT INTO User (birthday,password,email,phone_number,first_name,last_name,created_at,last_login) VALUES 
                              (:birthday,:password,:email,:phone_number,:firstName,:lastName,:created_at,:last_login)";
  $stmnt = $db->prepare($insert);

  $pass= $arr["password"];

  $options = ['cost' => 12];
  $pass = password_hash( $pass, PASSWORD_DEFAULT, $options);
  $date = strtotime($arr["birthday"]);
  
  $created_at = time();
  
  $stmnt->bindParam(':birthday', $date);
  $stmnt->bindParam(':password', $pass);
  $stmnt->bindParam(':email', $arr["email"]);
  $stmnt->bindParam(':phone_number', $arr["phone_number"]);
  $stmnt->bindParam(':firstName', $arr["firstName"]);
  $stmnt->bindParam(':lastName', $arr["lastName"]);
  $stmnt->bindParam(':created_at', $created_at);
  $stmnt->bindParam(':last_login', $created_at);


  $stmnt->execute(); 
}


function checkLogin($email,$password,&$arr){
  global $db;

  $query = 'SELECT email,password,first_name,userID,last_name FROM User WHERE User.email = ?';
  $stmnt = $db->prepare($query);
  $stmnt->execute(array($email));
  $result = $stmnt->fetch();

  $arr['firstName'] = $result['first_name'];
  $arr['lastName'] = $result['last_name'];
  $arr['userID'] = $result['userID'];

  return ($result !== false && password_verify($password, $result['password']));
}

function updateLoginTime($email){
  global $db;

  $newtime = time();

  $update = 'UPDATE User SET last_login = :lastLogin WHERE User.email = :email';
  $stmnt = $db->prepare($update);
  $stmnt->bindParam(':email', $email);
  $stmnt->bindParam(':lastLogin',$newtime);
  $stmnt->execute();
}

function isHost($userID){
  global $db;

  $result = getOwnedPlaces($userID);

  return (sizeof($result) > 0) ? 1 : 0;
}

function getUserDetailsProfile($userID){
  global $db;

  
  $query = "SELECT first_name as firstName, last_name as lastName, descrip, created_at as created FROM User where User.userID = ?";
  $stmnt = $db->prepare($query);
  $stmnt->execute(array($userID));
  $result = $stmnt->fetch();

  
  return $result;
}

function getOwnedPlaces($userID){
  global $db;

  $query = "SELECT placeID,name FROM Place Where Place.userID = ?";
  $stmnt = $db->prepare($query);
  $stmnt->execute(array($userID));
  $result = $stmnt->fetchAll();

  return $result;
}

function getUserImage($userID){
  echo "../images/users/" . ((file_exists("../images/users/user_" . $userID . ".png") ? "user_".$userID . ".png" : "user_default.png"));
}

function updateUser($arr){ 
  global $db;

  $query = "UPDATE User SET
  first_name = :firstname,
  descrip = :descrip,
  last_name = :lastname
  WHERE User.userID = :userID ";


  $stmnt = $db->prepare($query);
  $stmnt->bindParam(':firstname', $arr['firstName']);
  $stmnt->bindParam(':lastname',  $arr['lastName']);
  $stmnt->bindParam(':descrip', $arr['descrip']);
  $stmnt->bindParam(':userID', $arr['userID'] );

  return $stmnt->execute();
  // return $stmnt->execute();

}

