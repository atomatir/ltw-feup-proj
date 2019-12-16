<?php

require_once "connection.php";
require_once "db_address.php";
require_once "db_user.php";

function getReservationsDates($placeID){
  if(!isPlace($placeID)) return FALSE;

  global $db;

  $stmnt = $db->prepare("SELECT date_begin as dateBegin, date_end as dateEnd FROM Reservations WHERE placeID = ?");
  $stmnt->execute(array($placeID));
  $result = $stmnt->fetchAll();
  return $result;
}

function getReservationsInfo($placeID){
  if(!isPlace($placeID)) return FALSE;
  global $db;

  $stmnt = $db->prepare(
    "SELECT * FROM Reservation WHERE placeID=? "
  );
  $stmnt->execute(array($placeID));
  $result = $stmnt->fetchAll();

  // foreach ($result as &$value) {
  //   $userID = $value['userID'];
  //   $profile = getUserDetailsProfile($userID);
  //   $value['user'] = $profile['firstName'] . $profile['lastName'];
  // }

  return $result;

}


function insertReservation($arr){
  if(!isset($arr['userID']) ||!isset($arr['placeID']) ||!isset($arr['startDate']) ||!isset($arr['endDate']) ) 
    return FALSE;

  global $db;

  $insert = "INSERT INTO Reservation(userID,placeID,date_begin,date_end)
                             VALUES (?,?,?,?)";

  $stmnt = $db->prepare($insert);
  $result = $stmnt->execute(array(
    $arr['userID'],
    $arr['placeID'],
    $arr['startDate'],
    $arr['endDate']
  ));



  return ($result == FALSE) ? $result : $db->lastInsertId();
}