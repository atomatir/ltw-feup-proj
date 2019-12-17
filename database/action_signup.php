<?php
require_once 'db_user.php';
require_once 'checkInput.php';

$arr = array();

$arr['email']     = $_POST['email'];
$arr['password']  = checkInput($_POST['password']); 
$arr['firstName'] = checkInput($_POST['firstName']);  
$arr['lastName']  = checkInput($_POST['lastName']);  
$arr['birthday']  = checkInput($_POST['birthday']);  
$arr['phone_number']  = checkInput($_POST['phonenumber']);  

createUser($arr);

if (isset($_SERVER["HTTP_REFERER"])) {
  header("Location: ../index.php");
}