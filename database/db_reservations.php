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

  foreach ($result as &$value) {
    $userID = $value['userID'];
    $profile = getUserDetailsProfile($userID);
    $value['user'] = $profile['firstName'] . $profile['lastName'];
  }

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

function getReservationsUser($userID){
  if(!isUser($userID)) return FALSE;

  global $db;

  $query = "SELECT Reservation.reservationID, User.first_name as firstName, User.last_name as lastName, Place.name as placeName,Place.price_by_night as price, Reservation.date_begin as dateBegin, Reservation.date_end as dateEnd, Place.placeID as placeID, Place.addressID as addressID FROM Place,Reservation,User WHERE Reservation.userID = ? AND Place.placeID = Reservation.placeID AND User.userID = Reservation.userID";
  $stmnt = $db->prepare($query);
  $stmnt->execute(array($userID));
  $result = $stmnt->fetchAll();

  
  foreach ($result as &$val){
    $address = getPlaceDetails($val['addressID']);
    $city = getAddress($val['addressID']);
    $countrycity = getCountryFromCity($city['cityID']);
    
    
    $val['country'] = $countrycity['country'];
    $val['city'] = $countrycity['city'];
  }
  return $result;
}

function getReservationsPlace($userID){
  if(!isPlace($userID)) return FALSE;

  global $db;

  $query = "SELECT Reservation.reservationID, User.first_name as firstName, User.last_name as lastName, Place.name as placeName,Place.price_by_night as price, Reservation.date_begin as dateBegin, Reservation.date_end as dateEnd, Place.placeID as placeID, Place.addressID as addressID FROM Place,Reservation,User WHERE Reservation.placeID = ? AND Place.placeID = Reservation.placeID AND User.userID = Reservation.userID";
  $stmnt = $db->prepare($query);
  $stmnt->execute(array($userID));
  $result = $stmnt->fetchAll();

  
  foreach ($result as &$val){
    $address = getPlaceDetails($val['addressID']);
    $city = getAddress($val['addressID']);
    $countrycity = getCountryFromCity($city['cityID']);
    
    
    $val['country'] = $countrycity['country'];
    $val['city'] = $countrycity['city'];
  }
  return $result;
}
