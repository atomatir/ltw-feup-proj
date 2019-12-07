<?php

include_once "./db_user.php";

if(!isset($_POST['email'])){
  echo json_encode(array("exists"=>FALSE));
} else{
  try {
    $bool = searchUser($_POST['email']);
  } catch (\Throwable $th) {
    echo json_encode(array("exists"=>FALSE,"error"=>$th.getMessage()));
    die();
  }
  // $bool = ($bool>0);
  echo json_encode(array('exists'=>$bool,"error"=>" "));
}