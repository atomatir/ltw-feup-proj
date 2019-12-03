<?php
require_once 'db_user.php';

$arr = array();

$arr['email']     = $_POST['email'];
$arr['password']  = $_POST['password']; 
$arr['firstName'] = $_POST['firstName'];  
$arr['lastName']  = $_POST['lastName'];  
$arr['birthday']  = $_POST['birthday'];  
$arr['phone_number']  = $_POST['phonenumber'];  

createUser($arr);

if (isset($_SERVER["HTTP_REFERER"])) {
  // header("Location: " . $_SERVER["HTTP_REFERER"]);
  header("Location: ../index.php");
}