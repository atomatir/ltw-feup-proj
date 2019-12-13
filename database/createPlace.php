<?php
require_once 'session.php';
require_once 'db_address.php';


$arr = array();

if(!isset($_POST['name'])){
  echo FALSE;
  // die();
} 
if(!isset($_SESSION['userID'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['created_at'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['descrip'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['number_bathrooms'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['number_bedrooms'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['max_guests'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['price_by_night'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['cityID'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['postal_code'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['street_number'])){
  echo FALSE;
  // die();
} 
if(!isset($_POST['address'])){
  echo FALSE;
  // die();
} 

$arr['name'] = $_POST['name'];
$arr['userID'] = $_SESSION['userID'];
$arr['descrip'] = $_POST['descrip'];
$arr['number_bathrooms'] = $_POST['number_bathrooms'];
$arr['number_bedrooms'] = $_POST['number_bedrooms'];
$arr['max_guests'] = $_POST['max_guests'];
$arr['price_by_night'] = $_POST['price_by_night'];
$arr['cityID'] = $_POST['cityID'];
$arr['postal_code'] = $_POST['postal_code'];
$arr['street_number'] = $_POST['street_number'];
$arr['address'] = $_POST['address'];

print_r($_SESSION);
$placeID = createPlace($arr);


if($placeID == FALSE){
  // remove addressid
  echo "something went wrong";
  // die();
}


