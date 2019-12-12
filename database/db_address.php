<?php
require_once 'connection.php';


function createAddress($arr){
  global $db;

  $insert = 'INSERT INTO Address (cityID,postal_code,street_number,address)
                         VALUES  (:cityID,:postal_code,:street_number,:address);';
  $stmnt = $db->prepare($insert);

  if(isset($arr['cityID'])) $stmnt->bindParam(':cityID',$arr['cityID']); else return FALSE;    
  if(isset($arr['postal_code'])) $stmnt->bindParam(':postal_code',$arr['postal_code']); else return FALSE;
  if(isset($arr['street_number'])) $stmnt->bindParam(':street_number',$arr['street_number']); else return FALSE;
  if(isset($arr['address'])) $stmnt->bindParam(':address',$arr['address']); else return FALSE;

  $stmnt->execute();

  return $db->lastInsertId();
}


function createPlace($arr){
  global $db;

  $addr = createAddress($arr);

  if($addr == FALSE) return FALSE;

  $created = time();

  if(!isset($arr['name'])) return FALSE;  
  if(!isset($arr['addressID'])) return FALSE;
  if(!isset($arr['userID'])) return FALSE;
  if(!isset($arr['created_at'])) return FALSE;
  if(!isset($arr['descrip'])) return FALSE;
  if(!isset($arr['number_bathrooms'])) return FALSE;
  if(!isset($arr['number_bedrooms'])) return FALSE;
  if(!isset($arr['max_guests'])) return FALSE;  
  if(!isset($arr['price_by_night'])) return FALSE;


  $insert = "INSERT INTO Place (name,addressID,userID,created_at,descrip,number_bathrooms,number_bedrooms,max_guests,price_by_night)
                        VALUES (:name,:addressID,:userID,:created_at,:descrip,:number_bathrooms,:number_bedrooms,:max_guests,:price_by_night);";
  $stmnt = $db->prepare($insert);
  $stmnt->execute(array(
    "name" => $arr['name'],
    "addressID" => $arr['addressID'],
    "userID" => $arr['userID'],
    "created_at" => $arr['created_at'],
    "descrip" => $arr['descrip'],
    "number_bathrooms" => $arr['number_bathrooms'],
    "number_bedrooms" => $arr['number_bedrooms'],
    "max_guests" => $arr['max_guests'],
    "price_by_night" => $arr['price_by_night']
  ));

  $id = $db->lastInsertId();

  return $id;
}