<?php

include_once("database/connection.php");

function searchUser($email){
  global $db;

  $stmnt = $db->prepare("SELECT username FROM User WHERE User.email = ?");
  $stmnt->execute(array($email));
  return $stmnt->fetch();
}

function createUser(User $User){
  if(!searchUser($User->email)) return FALSE;

  $insert = "INSERT INTO User ()";

}