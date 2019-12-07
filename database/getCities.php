<?php
require_once "./db_cities.php";


$state = $_GET['state'];

$states = array();

try {
  $states = getAllCitiesFromState($state);
} catch (\Throwable $th) {
  echo "Error";
}

echo json_encode($states);
?>