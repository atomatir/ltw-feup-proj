<?php
require_once 'session.php';
require_once 'db_address.php';
require_once 'checkInput.php';


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

$arr['name'] = checkInput($_POST['name']);
$arr['userID'] = $_SESSION['userID'];
$arr['descrip'] = checkInput($_POST['descrip']);
$arr['number_bathrooms'] = checkInput($_POST['number_bathrooms']);
$arr['number_bedrooms'] = checkInput($_POST['number_bedrooms']);
$arr['max_guests'] = checkInput($_POST['max_guests']);
$arr['price_by_night'] = checkInput($_POST['price_by_night']);
$arr['cityID'] = checkInput($_POST['cityID']);
$arr['postal_code'] = checkInput($_POST['postal_code']);
$arr['street_number'] = checkInput($_POST['street_number']);
$arr['address'] = checkInput($_POST['address']);

print_r($_SESSION);
$placeID = createPlace($arr);


if($placeID == FALSE){
  // remove addressid
  echo "something went wrong";
  // die();
}

header("Location: ../pages/profile-page.php?userID=" . $_SESSION['userID']);


