<?php

require_once("connection.php");

function searchUser($email){
  global $db;
  $stmnt = $db->prepare("SELECT email FROM User WHERE User.email = ?;");
  $stmnt->execute(array($email));
  $result = $stmnt->fetchAll();
  return sizeof($result);
}


function generateSalt(){
  $fp = fopen('/dev/urandom', 'r');
  $randomString = fread($fp, 32);
  fclose($fp);
  return $randomString;
}

function createUser($arr){
  if(searchUser($arr['email']) != 0) {
    echo 'merdou';
    return FALSE;
  }
  global $db;

  $insert = "INSERT INTO User (birthday,password,salt,email,phone_number,first_name,last_name,created_at,last_login) VALUES 
  (:birthday,:password, :salt,:email,:phone_number,:firstName,:lastName,:created_at,:last_login);";
  $stmnt = $db->prepare($insert);

  $pass= $arr["password"];
  $salt = generateSalt();
  echo $pass.$salt;

  $pass = password_hash( $pass . $salt, PASSWORD_DEFAULT);
  $date = strtotime($arr["birthday"]);
  
  $created_at = time();
  
  $stmnt->bindParam(':birthday', $date);
  $stmnt->bindParam(':password', $pass);
  $stmnt->bindParam(':salt', $salt);
  $stmnt->bindParam(':email', $arr["email"]);
  $stmnt->bindParam(':phone_number', $arr["phone_number"]);
  $stmnt->bindParam(':firstName', $arr["firstName"]);
  $stmnt->bindParam(':lastName', $arr["lastName"]);
  $stmnt->bindParam(':created_at', $created_at);
  $stmnt->bindParam(':last_login', $created_at);


  $stmnt->execute(); 
}